<x-layout>
    <div class="text-white d-flex bg-black px-5 position-relative h-100%">

          <div class="mx-4 col-md-2 fixed-top" style="left: 50px;">
            <x-home-list/>
          </div>

          <div class="col-md-6 px-3 border border-top-0 border-bottom-0" style="margin-left: 260px;">
            <form action="{{ route('post.store') }}" method="post" style="width: 100%">

                @csrf

                <div class="d-flex">
                    <img src="https://picsum.photos/300?random={{ rand() }}" alt="user icon" class="rounded-circle mt-3 mx-2" style="width: 8%; height: 100%;"/>

                    <div class="mb-3 w-100">
                        <label for="" class="form-label"></label>
                        <textarea class="form-control bg-transparent border-0 fs-5 text-white" placeholder="What's happening?" name="post_value" id="" rows="2"></textarea>

                        <div class="d-flex justify-content-between mt-3">
                            <ul class="d-flex list-unstyled gap-2">
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    collections_bookmark
                                    </span></a></li>
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    gif_box
                                    </span></a></li>
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    ballot
                                    </span></a></li>
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    collections_bookmark
                                    </span></a></li>
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    mood
                                    </span></a></li>
                                <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                    calendar_month
                                    </span></a></li>
                                    <li><a href="#" class="text-info"><span class="material-symbols-outlined">
                                        location_on
                                    </span></a></li>
                            </ul>

                            <button type="submit" class="rounded-pill px-4 border-0 bg-primary text-white">Tweet</button>

                        </div>
                    </div>
                </div>
            </form>

            {{-- Tweets --}}

            @if ($tweets->isEmpty())
                <x-tweets :tweets="$tweets" :users="$users" :comments="$comments"/>

                @else
                <x-tweets :tweets="$tweets" :users="$users" :comments="$comments" :commentid="$commentid"/>
            @endif



          </div>

          <div class="w-100 mt-1 mx-4">

            <div class="p-2 text-white position-fixed top-0 end-0" style="margin-right: 70px; width: 25%">
                <input type="text" class="form-control rounded-pill bg-dark text-white"  placeholder="Search Twitter" aria-label="Search Twitter" aria-describedby="button-addon2">
            </div>

            <div class="bg-dark rounded  d-flex flex-column flex-wrap mt-5 p-3">
                <h4>Trends for you</h4>

                <ul class="d-flex flex-column gap-3 list-unstyled">
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>
                    <li>Hello Sydney</li>

                </ul>
            </div>

          </div>

          <form action="{{ route('user.destroy') }}" method="post">
            @csrf
            <button type="submit" name="logout-btn">Logout</button>
          </form>

      </div>
</x-layout>
