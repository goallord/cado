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
                                        <h4 class="mt-1 mb-5 pb-1">Verify Email Address</h4>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                    </div>

                                    @if (session('status') == 'verification-link-sent')
                                        <div data-mdb-input-init class="form-outline mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4 d-flex justify-content-between">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block gradient-custom-2" type="submit">
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary" type="submit">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>

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
