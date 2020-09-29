<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PaSimpel - Inspektorat Kabupaten Tangerang</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
	
	<link rel="stylesheet" href="theme/backend/libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="theme/backend/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="theme/backend/libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="theme/backend/assets/css/bootstrap.css">
	<link rel="stylesheet" href="theme/backend/assets/css/core.css">
	<link rel="stylesheet" href="theme/backend/assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page" style="background:#5b69bc;">
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="{{url('/')}}">
				{{-- <span><i class="fa fa-gg"></i></span> --}}
                <span>PaSimpel By Inspektorat</span><br>
                <span style="font-size:15px;">Pemerintah Kabupaten Tangerang</span>
			</a>
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Silahkan Lakukan Login</h4>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
                    <div class="form-group">
                        {{-- <input id="sign-in-email" type="email" class="form-control" placeholder="Email"> --}}
                        <input id="sign-in-email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {{-- <input id="sign-in-password" type="password" class="form-control" placeholder="Password"> --}}
                        <input id="sign-in-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- <div class="form-group m-b-xl">
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="keep_me_logged_in"/>
                            <label for="keep_me_logged_in">Keep me signed in</label>
                        </div>
                    </div> --}}
                <button type="submit" class="btn" style="background:#5b69bc;color:#fff;">
                    {{ __('Login') }}
                </button>
            </form>
        </div><!-- #login-form -->

        {{-- <div class="simple-page-footer">
            <p><a href="password-forget.html">FORGOT YOUR PASSWORD ?</a></p>
            <p>
                <small>Don't have an account ?</small>
                <a href="signup.html">CREATE AN ACCOUNT</a>
            </p>
        </div><!-- .simple-page-footer --> --}}
        {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}

	</div><!-- .simple-page-wrap -->
</body>
</html>
                   
                