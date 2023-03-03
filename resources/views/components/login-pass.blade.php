<x-layout>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <form action="login-user" class="center px-5 pb-5 pt-3 bg-black text-white rounded d-flex justify-content-center align-items-center flex-column gap-3 position-relative" style="width: 650px; height: auto">

            @csrf

            <i class="fa-solid fa-x position-absolute top-0 start-0 m-3 btn cursor-pointer text-white"></i>

            <i class="fa-brands fa-twitter fs-2"></i>

            <h2>Sign in to twitter</h2>

            <div>

                <input type="text" name="username" class="px-2 py-3 mb-3 rounded bg-transparent border border-gray w-100 text-secondary" readonly value="{{ $userEmail }}">

                <input type="text" name="password" placeholder="Enter your password" class="px-2 py-3 rounded bg-transparent border border-gray w-100 text-white">

                <button type="submit" class="btn-login btn bg-white text-black rounded-pill border-5 px-2 w-100 my-3">Submit</button>

                <div class="col text-start">Dont have an account? <a href="/create" class="sign-up-btn text-decoration-none">Sign up</a></div>
            </div>

        </form>
    </div>

</x-layout>
