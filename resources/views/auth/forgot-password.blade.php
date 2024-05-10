<x-guest-layout>
    <section class="h-100 gradient-form" style="background-color: #cce5ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{asset('logo.png')}}"
                                             style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Forgot Your Password</h4>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>

                                    <!-- Session Status -->
                                    @if (session('status'))
                                        <div data-mdb-input-init class="form-outline mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="Email address" value="{{old('email')}}" required autofocus />
                                            <label class="form-label" for="email">Email address</label>
                                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">
                                                {{ __('Email Password Reset Link') }}
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Basilica of the Most Holy Trinity</h4>
                                    <p class="small mb-0">The Onitsha Archdiocese, located in Anambra State, Nigeria, plays a significant role in serving a substantial population of Catholic faithful. With a total of 2,185,561 Catholics, the Archdiocese comprises 136 parishes and is served by 498 priests. It is also supported by 718 religious individuals who fulfill various roles within the Catholic community.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
