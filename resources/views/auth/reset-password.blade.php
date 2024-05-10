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
                                        <h4 class="mt-1 mb-5 pb-1">Reset Password</h4>
                                    </div>

                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="Email address" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" />
                                            <label class="form-label" for="email">Email address</label>
                                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="Password" required autocomplete="new-password" />
                                            <label class="form-label" for="password">Password</label>
                                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                                   placeholder="Confirm Password" required autocomplete="new-password" />
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">
                                                {{ __('Reset Password') }}
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
