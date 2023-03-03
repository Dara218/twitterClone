<x-layout>

    <div class="container d-flex align-items-center justify-content-center min-vh-100 py-5">
        <form action="{{ route('user.store') }}" class="center px-5 pb-5 pt-3 bg-black text-white rounded d-flex justify-content-center align-items-center flex-column gap-3 position-relative" style="width: 650px; height: auto" method="POST">

            @csrf

            <i class="fa-solid fa-x position-absolute top-0 start-0 m-3 btn cursor-pointer text-white"></i>

            <i class="fa-brands fa-twitter fs-2"></i>

            <h2>Create your account</h2>

            <div>
                <input type="text" name="name" placeholder="Name" class="px-2 py-3 rounded bg-transparent border border-gray w-100 text-white" value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="text" name="username" placeholder="Username" class="px-2 py-3 rounded bg-transparent border border-gray w-100 my-3 text-white" value="{{ old('username') }}">
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="password" name="password" placeholder="Password" class="px-2 py-3 rounded bg-transparent border border-gray w-100 mb-3 text-white" value="{{ old('password') }}">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input type="email" name="email" placeholder="Email" class="px-2 py-3 rounded bg-transparent border border-gray w-100 text-white" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div>
                    <h5 class="mt-3 mb-3">Date of birth</h5>
                    <p class="fs-6 text-secondary">This will not be shown publicly. Confirm your own age, even if this account is for a business, a pet, or something else.</p>

                    <div class="container">
                        <div class="row">
                            <x-dropdown-register/>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn-login btn bg-white text-black rounded-pill border-5 px-2 w-100 my-3">Submit</button>
                <p>Have an account already? <a href="/login">Log in</a></p>
            </div>

        </form>
    </div>

</x-layout>
