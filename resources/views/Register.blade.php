@extends('layout/layout-comman')
@section('space-work')



<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                            @if(Session::has('success'))
                            <div style="color:green" class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <form action="{{ route('valRegister') }}" method="POST">
                                @csrf

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                    <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" />

                                    <span class="text-danger  text-center">
                                        @error('name')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>


                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                                    <span class="text-danger  text-center">
                                        @error('email')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                                    <span class="text-danger  text-center">
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    <input type="password" id="form3Example4cdg" name="confirm_password" class="form-control form-control-lg" />
                                    <span class="text-danger  text-center">
                                        @error('confirm_password')
                                        {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{url('/login')}}" class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection