@extends('layouts.MainLayout')

@section('content')


<section>
    <div class="page-title">
        <h1>My Account</h1>
        <div class="page-dir">
            <span>home</span>
            <span> / </span>
            <span class="current-pag">Login or Regestration</span>
        </div>
    </div>
</section>

<section class="container">
    @if (session()->has('error-login'))
        <div style="font-size: 16px" class="alert alert-danger" role="alert">
            {{session()->get('error-login')}}
        </div>
    @endif
    <div class="form-area">
        <h1>Login</h1>
        <div class="form-area-login">
            <div class="form-border">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                            aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                            aria-controls="pills-register" aria-selected="false">Register</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form action="" method="POST">
                            <div class="text-center mb-3">
                                <p>Sign in with:</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>

                            <p class="text-center">or:</p>

                            <div class="alert alert-danger d-none" id="showErrorLogin" role="alert">
                                
                            </div>

                            <div class="form-group">
                                <label for="userInputEmail">Email address</label>
                                <input type="email" class="form-control" id="userInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                    <div class="alert-box-email d-none">* This field is required</div>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="userInputPassword">Password</label>
                                <input type="password" class="form-control" id="userInputPassword"
                                    placeholder="Password">
                                    <div class="alert-box-password d-none">* This field is required</div>
                            </div>

                            <!-- 2 column grid layout -->
                            <div class="row mb-4">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" type="checkbox" value="" id="loginCheck"
                                            checked />
                                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Simple link -->
                                    <a class="bc" href="#">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button id="oldUserSubmit" class="btn btn-primary btn-block mb-4">Sign in</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Not a member? <a class="bc" href="#!">Register</a></p>
                            </div>
                        </form>
                    </div>



                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form action="/reg" method="POST">
                            <div class="text-center mb-3">
                                <p>Sign up with:</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>

                            <p class="text-center">or:</p>

                            <!-- Name input -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="userFirstName" class="form-control" id="userFirstName"
                                        placeholder="First Name">
                                    <div class="alert-box-fname d-none">* This field is required</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="userLastName" class="form-control" id="userLastName"
                                        placeholder="Last Name">
                                    <div class="alert-box-lname d-none">* This field is required</div>
                                </div>
                            </div>


                            <!-- Email input --> 
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email Address">
                                <div class="alert-box-email2 d-none">* This field is required</div>
                            </div>

                            {{-- Phone Number Input --}}
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" name="userPhone" id="userPhone" placeholder="Phone Number">
                                <div class="alert-box-phn d-none">* This field is required</div>
                            </div>
                            
                            <!-- Password input -->
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" id="userPassword" class="form-control" />
                                <div class="alert-box-pwd d-none">* This field is required</div>
                            </div>

                            <!-- Repeat Password input -->
                            <div class="form-group">
                                <label for="ReEnterPassword">Repeat Password</label>
                                <input type="password" id="userRePassword" class="form-control" />
                                <div class="alert-box-rePwd d-none">* This field is required</div>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                                    aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label" for="registerCheck">
                                    I have read and agree to the terms
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button id="newUserSubmit" class="btn btn-primary btn-block mb-3">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')

<script>
    regestration();
    login();
</script>

@endsection