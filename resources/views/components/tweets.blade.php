@foreach ($tweets as $tweet)

    <div class="d-flex gap-2 border border-start-0 border-end-0 py-2 position-relative">
        <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

        <div class="d-flex flex-column">

            <div class="d-flex gap-2">
                <span>{{ $tweet->user->name }}</span>
                <p class="text-secondary">{{ '@'.$tweet->user->username }}</p>
                <p class="text-secondary">{{ $tweet->created_at->diffForHumans() }}</p>
            </div>

            <p>{{ $tweet->post_value }}</p>

            {{-- TODO: Delete popover --}}
            <span class="material-symbols-outlined position-absolute top-0 end-0"
                        data-bs-container="body"
                        data-bs-toggle="popover"
                        data-bs-placement="right"
                        data-bs-content="Right popover"
                        style="cursor: pointer;">
                            more_horiz
            </span>

            <form action="{{ route('tweet.destroy', ['post' => $tweet->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="text-danger">Delete</button>
            </form>

            {{-- Tweet Options --}}
            <div>
                @foreach ($retweets as $retweet) @endforeach
                    @if ($retweets->isEmpty())
                    <x-tweet-option :tweet="$tweet"/>

                    @else
                    <x-tweet-option :tweet="$tweet" :retweet="$retweet"/>
                @endif
            </div>

            {{-- Comments on tweets --}}
            @if ($tweet->comment->count() > 0)

                @foreach ($tweet->comment as $comment)

                    <div class="d-flex gap-2">
                        <span>{{ $comment->user->name }}</span>
                        <p>{{ '@'.$comment->user->username  }}</p>
                        <p>{{ $comment->user->created_at->diffForHumans() }}</p>
                    </div>

                    <p>{{ $comment->comment_value }}</p>

                    <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="text-danger">Delete</button>
                    </form>

                    {{-- Comment tweet option --}}
                    <div>
                        <x-tweet-option-comment :comment="$comment"/>
                    </div>

                @endforeach

                {{-- Replies on comments --}}
                @if ($comment->count() > 0)
                    @foreach ($replies as $reply)
                        <div class="d-flex gap-2">
                            <span>{{ $reply->user->name }}</span>
                            <p>{{ '@'.$reply->user->username  }}</p>
                            <p>{{ $reply->user->created_at->diffForHumans() }}</p>
                        </div>

                        <p>{{ $reply->reply_value }}</p>

                        <form action="{{ route('reply.destroy', ['reply' => $reply->id]) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="text-danger">Delete</button>
                        </form>

                        {{-- Comment tweet option --}}
                        <div>
                            <x-tweet-option-comment :comment="$comment"/>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endforeach

@foreach ($retweets as $retweet)

    <div class="d-flex gap-2 border border-start-0 border-end-0 py-2 position-relative">
        <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

        <div class="d-flex flex-column">

            <p class="d-flex gap-2 align-items-center pt-1 text-secondary">
                <span>
                    <i class="fas fa-retweet"></i>
                </span> {{ $retweet->user->name }} retweeted.
            </p>

            <div class="d-flex gap-2">
                <span>{{ $retweet->user->name }}</span>
                <p class="text-secondary">{{ '@'.$retweet->user->username }}</p>
                <p class="text-secondary">{{ $retweet->created_at->diffForHumans() }}</p>
            </div>

            <p>{{ $retweet->comment_value }}</p>

            {{-- TODO: Delete popover --}}
            <span class="material-symbols-outlined position-absolute top-0 end-0" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Right popover" style="cursor: pointer;">
                more_horiz

            </span>

            <form action="{{ route('retweet.destroy', ['retweet' => $retweet->id]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="text-danger">Delete</button>
            </form>

            {{-- Tweet Options --}}
            <div>
                <x-retweet-option :tweet="$tweet" :retweet="$retweet"/>
            </div>

            {{-- Comments on tweets --}}
            @if (!is_Int($retweet->comments) && $retweet->comments->count() > 0)

                    @foreach ($retweet->comments as $comment)

                        <div class="d-flex gap-2">
                            <span>{{ $comment->user->name }}</span>
                            <p>{{ '@'.$comment->user->username  }}</p>
                            <p>{{ $comment->user->created_at->diffForHumans() }}</p>
                        </div>

                        <p>{{ $comment->comment_value }}</p>

                        <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="text-danger">Delete</button>
                        </form>


                        {{-- Comment tweet option --}}
                        <div>
                            <x-retweet-option-comment :comment="$comment"/>
                        </div>

                    @endforeach
            @endif

        </div>
    </div>
@endforeach

