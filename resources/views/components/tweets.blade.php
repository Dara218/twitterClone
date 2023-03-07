{{-- @slot('tweets') --}}

@foreach ($tweets as $tweet)
{{-- {{ dd($tweet) }} --}}

    <div class="overlay position-fixed start-0 top-0 w-100 vh-100 z-index-3" style="display: none; background-color: rgba(0, 0, 0, 0.096);"></div>

    <div class="d-flex gap-2 border border-start-0 border-end-0 py-2">
        <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

        <div class="d-flex flex-column">
            <div class="d-flex gap-2">
                <span>{{ $tweet->user->name }}</span>
                <p>{{ $tweet->user->username }}</p>
                <p>{{ $tweet->created_at }}</p>
            </div>
            <p>{{ $tweet->post_value }}</p>

            <ul class="d-flex list-unstyled" style="gap:10%;">
                <li style="cursor:pointer"><span data-username="{{ $tweet->user->username }}" data-post_value="{{ $tweet->post_value }}" data-name="{{ $tweet->user->name }}" class="comment-btn material-symbols-outlined">
                    chat_bubble
                    </span></li>
                <li style="cursor:pointer"><span class="material-symbols-outlined">
                    cycle
                    </span></li>
                <li style="cursor:pointer"><span class="material-symbols-outlined">
                    favorite
                    </span></li>
                <li style="cursor:pointer"><span class="material-symbols-outlined">
                    monitoring
                    </span></li>
                <li style="cursor:pointer"><span class="material-symbols-outlined">
                    ios_share
                    </span></li>
            </ul>
        </div>

    </div>

    {{-- Modal --}}
    <div class="tweet-modal d-flex flex-column gap-2 py-2 position-fixed bg-dark z-index-4 px-3 py-4 rounded" style="display: none !important; left:50%; top: 50%; transform:translate(-50%, -50%);">

        <div class="d-flex gap-2 py-2">
            {{-- TODO:add X button to comment --}}
            <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

            <div class="d-flex flex-column w-100">
                <div class="d-flex gap-2">
                    <span class="name"></span>
                    <p class="username"></p>
                    <p></p>
                </div>
                <p class="tweet-value"></p>

                <p class="text-secondary" style="font-size: 0.9rem">Replying to @<span class="username"></span></p>

            </div>
        </div>

        {{-- <div class="d-flex gap-2 py-2">
            <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

            <div class="d-flex flex-column">
                <div class="d-flex gap-2">
                    <span>{{ $tweet->user->name }}</span>
                    <p>{{ $tweet->user->username }}</p>
                    <p>{{ $tweet->created_at }}</p>
                </div>
                <p>{{ $tweet->post_value }}</p>
            </div>
        </div> --}}

    </div>

@endforeach
