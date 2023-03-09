@foreach ($tweets as $tweet)
{{-- {{ dd($tweet->comments) }} --}}

    {{-- <div x-show="open"
        class="overlay position-fixed start-0 top-0 w-100 vh-100 z-index-3"
        style="display: none; background-color: rgba(0, 0, 0, 0.096);" >
    </div> --}}

    <div class="d-flex gap-2 border border-start-0 border-end-0 py-2">
        <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

        <div class="d-flex flex-column">
            <div class="d-flex gap-2">
                <span>{{ $tweet->user->name }}</span>
                <p>{{ '@'.$tweet->user->username }}</p>
                <p>{{ $tweet->created_at->diffForHumans() }}</p>
            </div>
            <p>{{ $tweet->post_value }}</p>

            <div>
                <x-tweet-option :tweet="$tweet"/>
            </div>

            @foreach ($comments as $comment)
                {{-- {{ dd($comment) }} --}}

                <div class="d-flex gap-2">
                    <span>{{ $comment->user->name }}</span>
                    <p>{{ '@'.$comment->user->username  }}</p>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>

                <p>{{ $comment->comment_value }}</p>

                <div>
                    <x-tweet-option :tweet="$tweet"/>
                </div>

            @endforeach

        </div>
    </div>
@endforeach
