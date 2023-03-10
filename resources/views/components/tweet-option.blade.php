<ul class="d-flex list-unstyled" style="gap:10%;">

    {{-- Comment Modal --}}
    <li x-data="{ open: false, name:'', username:'', postValue:'', created_at:'' }" x-on:click.away="open = false" class="d-flex align-items-center gap-2" style="cursor:pointer">

        <span class="comment-btn material-symbols-outlined"
        x-on:click="open=true; name='{{ $tweet->user->name }}';
                            username='{{ $tweet->user->username }}';
                            postValue='{{ addslashes($tweet->post_value) }}';
                            created_at='{{ $tweet->created_at }}';">
                            chat_bubble
        </span> {{ $tweet->comments }}

        <form x-show="open"
        x-cloak
        class="tweet-modal  gap-2 py-2 position-fixed bg-dark px-3 py-4 rounded" style="display: none !important; left:50%; top: 50%; transform:translate(-50%, -50%); z-index: 9999;"
        method="GET"
        action="{{ route('comment.store', ['post' => $tweet->id]) }}">

            @csrf

            <div class="d-flex gap-2 py-4 position-relative">

                <i class="fa-solid fa-xmark position-absolute top-0 start-0" x-on:click="open=false" style="cursor: pointer;"></i>

                <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

                <div class="d-flex flex-column w-100">
                    <div class="d-flex gap-2">
                        <span x-text="name"></span>
                        <p x-text="username"></p>
                        <p x-text="created_at"></p>
                    </div>
                    <p x-text="postValue"></p>

                    <p class="text-secondary" style="font-size: 0.9rem">Replying to @<span x-text="username"></span></p>

                </div>
            </div>

            <div class="d-flex gap-2 py-2">
                <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

                <textarea class="form-control bg-transparent border-0 fs-5 text-white" placeholder="Tweet your reply" name="post_value" id="" rows="2"></textarea>

            </div>

            <div class="d-flex justify-content-between px-3 my-2">
                <ul class="d-flex list-unstyled" style="gap:10%;">

                    <li style="cursor:pointer">
                        <span class="material-symbols-outlined">
                            gallery_thumbnail
                        </span>
                    </li>
                    <li style="cursor:pointer">
                        <span class="material-symbols-outlined">
                            gif_box
                        </span>
                    </li>
                    <li style="cursor:pointer">
                        <span class="material-symbols-outlined">
                            ballot
                        </span>
                    </li>
                    <li style="cursor:pointer">
                        <span class="material-symbols-outlined">
                            schedule
                        </span>
                    </li>
                    <li style="cursor:pointer">
                        <span class="material-symbols-outlined">
                            location_on
                        </span>
                    </li>
                </ul>

                <button type="submit" class="rounded-pill px-4 border-0 bg-primary text-white">Reply</button>
            </div>

        </form>
    </li>

    {{-- Retweet Modal --}}
    <li x-data="{openRetweet: false}" x-on:click.away="openRetweet = false" class="d-flex align-items-center gap-2">

        <span>
            <i class="fas fa-retweet" x-on:click="openRetweet= !openRetweet" style="cursor:pointer"></i>
        </span>{{ $tweet->retweets }}

        <div x-show="openRetweet">
            <div class="comment-modal d-flex flex-column gap-2 rounded bg-black p-2 position-absolute">

                <div class="d-flex gap-2" style="cursor:pointer">
                    <span class="material-symbols-outlined">
                        cycle
                    </span>

                    <form method="POST" action="{{ route('retweet.store', $tweet) }}">
                        @csrf
                        <button type="submit" class="bg-transparent text-white">
                            Retweet
                        </button>
                    </form>

                </div>

                <div class="d-flex gap-2" style="cursor:pointer">
                    <span class="material-symbols-outlined">
                        edit_square
                    </span>

                    {{-- @foreach ($tweet->comment as $getTweet) --}}

                        <form method="POST" action="">
                            @csrf
                            <button type="submit" class="bg-transparent text-white">
                                Quote Tweet
                            </button>
                        </form>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </li>

    {{-- Like Option --}}
    <li style="cursor:pointer">
        <form action="" method="post">
            <button type="submit" class="material-symbols-outlined bg-transparent text-white">
                favorite
            </button>
        </form>
    </li>

    <li style="cursor:pointer"><span class="material-symbols-outlined">
        monitoring
        </span></li>
    <li style="cursor:pointer"><span class="material-symbols-outlined">
        ios_share
        </span></li>
</ul>
