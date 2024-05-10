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
                                        <h4 class="mt-1 mb-5 pb-1">Catholic Archdiocese of Onitsha</h4>
                                    </div>

                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <p>Please login to your account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('login') <small class="text-danger">{{$message}}</small>  @enderror
                                            <input type="text" name="login" id="login" class="form-control"
                                                   placeholder="Phone number or email address" autofocus autocomplete="username" value="{{old('login')}}" />
                                            <label class="form-label" for="login">Enter email, username or phone number</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('password') <small class="text-danger">{{$message}}</small>  @enderror
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="current-password" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                                                in</button>
                                            <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a  href="{{ route('register') }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary">Create new</a>
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
