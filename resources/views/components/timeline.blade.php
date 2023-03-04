<x-layout>
    <div class="container text-white d-flex flex-column align-items-center">

          <div class="position-fixed col-md-2" style="left:70px;">
            <x-home-list/>
          </div>
{{--
          <div class="position-fixed col-md-2" style="top:0; transform:translateX(-50%)">
            <div class="d-flex">
                <a name="" id="" class="btn btn-primary" href="#" role="button">Button</a>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Button</a>
            </div>
          </div> --}}

          <div class="col-md-6">
            <form action="#" method="post">
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label"></label>
                  <textarea class="form-control bg-transparent text-white" placeholder="What's happening?" name="" id="" rows="3"></textarea>
                </div>
            </form>
          </div>

          <div class="position-fixed end-0 top-0 col-md-3">
            <h4>Trends for you</h4>
          </div>

      </div>
</x-layout>
