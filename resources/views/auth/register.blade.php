<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">

    <title>Login</title>
    <!-- icons -->
    <link rel="apple-touch-icon" href="{{ asset('/assets/img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Bootstrap Core CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-all.min.css') }}">
    <!-- Slick slider CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
    <!-- Override CSS file - add your own CSS rules -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <style>
        .invalid-feedback {
            margin-top: .5rem;
            margin-left: .5rem;
            font-size: 80%;
            color: #e3342f
        }
    </style>
</head>

<body class="fullpage">
    <div id="form-section" class="container-fluid signup">
        <a class="website-logo" href="index.html">
            <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="">
        </a>
        <div class="menu-holder">
            <ul class="main-links">
                <li><a class="normal-link" href="{{ route('login') }}">Already have an account?</a></li>
                <li><a class="sign-button" href="{{ route('login') }}">Sign in <i class="hno hno-arrow-right"></i></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="form-holder">
                <div class="signin-signup-form">
                    <div class="form-items">
                        <div class="form-title">Sign up for new account</div>
                        <form id="signinform" action="{{ route('register') }}" method="POST" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-text">
                                    <input type="text" class="@error('first_name') is-invalid @enderror"
                                        name="first_name" id="first_name" value="{{ old('first_name') }}"
                                        placeholder="First name" required autocomplete="first_name">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-text">
                                    <input type="text" class="@error('last_name') is-invalid @enderror" name="last_name"
                                        id="last_name" value="{{ old('last_name') }}" placeholder="Last name" required
                                        autocomplete="last_name">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-text">
                                <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email"
                                    value="{{ old('email') }} " placeholder="E-mail Address" required
                                    autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-text">
                                <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                    id="password" placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-text">
                                <input type="password" class="@error('password') is-invalid @enderror"
                                    name="password_confirmation" id="password-confirm" placeholder="Confirm Password"
                                    required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-button">
                                <button id="submit" type="submit" class="btn btn-default">Sign Up <i
                                        class="hno hno-arrow-right"></i></button>
                            </div>
                            <div class="form-text text-holder">
                                <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept
                                    our <br> Terms of use and Privacy Policy.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="info-slider-holder">
                <div class="info-holder">
                    <div class="img-text-slider">
                        <div>
                            <img src="{{ asset('/assets/images/img-g1.png') }}" alt="">
                            <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure.</p>
                        </div>
                        <div>
                            <img src="{{ asset('/assets/images/img-g2.png') }}" alt="">
                            <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- scripts sources --}}
    <!-- JQuery scripts -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core scripts -->
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/js/paper-full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/metaball.js') }}" data-paper-canvas="infobg"></script>
    <!-- Main scripts -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
</body>

</html>