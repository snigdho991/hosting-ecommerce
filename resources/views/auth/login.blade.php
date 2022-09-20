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
    <div id="form-section" class="container-fluid signin">
        <a class="website-logo" href="index.html">
            <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="">
        </a>
        <div class="menu-holder">
            <ul class="main-links">
                <li><a class="normal-link" href="{{ route('register') }}">Don’t have an account?</a></li>
                <li><a class="sign-button" href="{{ route('register') }}">Sign up <i
                            class="hno hno-arrow-right"></i></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="form-holder">
                <div class="signin-signup-form">
                    <div class="form-items">
                        <div class="form-title">Sign in to your account</div>
                        <form id="signinform" action="{{ route('login') }}" method="POST" role="form">
                            @csrf
                            <div class="form-text">
                                <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email"
                                    value="{{ old('email') }} " placeholder="E-mail Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-text">
                                <input type="password" class="@error('password') is-invalid @enderror" name="password"
                                    id="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-text text-holder">
                                <input class="hno-radiobtn" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>


                            <div class="form-button">
                                <button id="submit" type="submit" class="btn btn-default">Sign in <i
                                        class="hno hno-arrow-right"></i></button>
                            </div>
                            <div class="form-text text-holder">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="info-slider-holder">
                <div class="info-holder">
                    <div class="img-text-slider">
                        <div>
                            <img src="{{ asset('/assets/images/img-b1.png') }}" alt="">
                            <p>Hadipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure.</p>
                        </div>
                        <div>
                            <img src="{{ asset('/assets/images/img-b2.png') }}" alt="">
                            <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure.</p>
                        </div>
                        <div>
                            <img src="{{ asset('/assets/images/img-b3.png') }}" alt="">
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