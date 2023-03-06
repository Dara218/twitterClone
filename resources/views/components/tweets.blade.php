{{-- @slot('tweets') --}}

@foreach ($tweets as $tweet)
{{-- {{ dd($tweet) }} --}}
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
                <li style="cursor:pointer"><span class="material-symbols-outlined">
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
    <div class="tweet-modal d-flex flex-column gap-2 py-2" style="display: none !important;">
        <div class="d-flex gap-2 py-2">
            <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

        <div class="d-flex flex-column">
            <div class="d-flex gap-2">
                <span>{{ $tweet->user->name }}</span>
                <p>{{ $tweet->user->username }}</p>
                <p>{{ $tweet->created_at }}</p>
            </div>
            <p>{{ $tweet->post_value }}</p>

        </div>
        </div>

        <div class="d-flex gap-2 py-2">
            <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

            <div class="d-flex flex-column">
                <div class="d-flex gap-2">
                    <span>{{ $tweet->user->name }}</span>
                    <p>{{ $tweet->user->username }}</p>
                    <p>{{ $tweet->created_at }}</p>
                </div>
                <p>{{ $tweet->post_value }}</p>
            </div>
        </div>

    </div>      

@endforeach
