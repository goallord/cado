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

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <p>Create your account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="text" name="name" id="name" class="form-control"
                                                   placeholder="Surname firstname and other names" autofocus autocomplete="name" value="{{old('name')}}"  />
                                            <label class="form-label" for="name">Name</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('username') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="text" name="username" id="username" class="form-control"
                                                   placeholder="Username" autocomplete="username" value="{{old('username')}}"  />
                                            <label class="form-label" for="username">Username</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('inter_dioceses') <small class="text-danger">{{$message}}</small> @enderror
                                            <select id="inter_dioceses" name="inter_dioceses" class="form-control" >
                                                <option value="" disabled selected>Select Diocesan Status</option>
                                                <option value="0" {{ old('inter_dioceses') === '0' ? 'selected' : '' }}>Diocesan Member</option>
                                                <option value="1" {{ old('inter_dioceses') === '1' ? 'selected' : '' }}>Inter Diocesan Member</option>
                                            </select>
                                            <label class="form-label" for="inter_dioceses">Diocesan Status</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="tel" name="phone" id="phone" class="form-control"
                                                   placeholder="Phone number" autocomplete="phone" value="{{old('phone')}}" required />
                                            <label class="form-label" for="phone">Phone number</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="Email address" autocomplete="email" value="{{old('email')}}" required />
                                            <label class="form-label" for="email">Email address</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('password') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="password" name="password" id="password" class="form-control"
                                                   placeholder="Password" autocomplete="new-password" required />
                                            <label class="form-label" for="password">Password</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                                   placeholder="Confirm Password" autocomplete="new-password" required />
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                                            <a class="text-muted" href="{{ route('login') }}">Already registered?</a>
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
