@extends('layouts.guest')

@section('content')
  <div class="py-6 px-6 h-full">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
      <div class="xl:w-10/12">
        <div class="block bg-white shadow-lg rounded-lg">
          <div class="lg:flex lg:flex-wrap g-0">
            <div class="lg:w-6/12 px-4 md:px-0">
              <div class="md:p-12 md:mx-6">
                <div class="text-center">
                  <img
                    class="mx-auto w-48"
                    src="/images/logoBk.png"
                    alt="logo"
                  />
                  <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">We are The BK Team</h4>
                </div>
                <form method="POST" action="{{ route('login') }}"> @csrf
                  <p class="mb-4">Please login to your account</p>
                  <div class="mb-4">
                    <input
                      id="email"
                      type="email"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 @error('email') is-invalid @enderror"
                      placeholder="Email"
                      name="email"
                      value="{{ old('email') }}" required
                    />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/> -->
                  </div>
                  <div class="mb-4">
                    <input
                      id="password"
                      type="password"
                      class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0  @error('password') is-invalid @enderror"
                      placeholder="Password"
                      name="password"
                    />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> -->
                  </div>
                  <div class="text-center pt-1 mb-12 pb-1">
                    <button
                      type="submit"
                      class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                      data-mdb-ripple="true"
                      data-mdb-ripple-color="light"
                      style="
                        background: linear-gradient(
                          to right,
                          #ee7724,
                          #d8363a,
                          #dd3675,
                          #b44593
                        );
                      "
                    >
                      Log in
                    </button>
                    <!-- <a  href="#!">Forgot password?</a> -->
                      @if (Route::has('password.request'))
                        <a class="text-gray-500" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      @endif
                  </div>
                  <div class="flex items-center justify-end pb-6">
                    <p class="mb-0 mr-2">Don't have an account?</p>
                  </div>
                </form>
              </div>
            </div>
            <div
              class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none"
              style="
                background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
              "
            >
              <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                <img src="images/smartfarm.jpg" alt="smart-farm">
                <!-- <h4 class="text-xl font-semibold mb-6">We are more than just a company</h4>
                <p class="text-sm">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
