<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('website/images/fav.png') }}" type="image/png">
    <style>
        .admin-signin-button:disabled {
            background: grey;
            cursor: default;
        }
    </style>
</head>


<body>

    <div class="admin-login-wrapper">

        <!-- LEFT LOGIN -->
        <div class="admin-login-form-area">

            <div class="admin-login-box">
                @php
                    $websiteSetting = App\Models\WebsiteSetting::where('is_active', true)->first();
                    $socialSetting = App\Models\SocialSetting::where('is_active', true)->first();
                @endphp
                @php
                    $logo = optional($websiteSetting)->logo
                        ? asset('storage/' . $websiteSetting->logo)
                        : asset('website/images/main-logo.png');
                    $logoWhite = optional($websiteSetting)->logo_white
                        ? asset('storage/' . $websiteSetting->logo_white)
                        : asset('website/images/main-logo.png');
                @endphp

                <img class="mb-2" src="{{ $logo }}">
                <div class="admin-login-heading">Welcome back</div>
                <div class="admin-login-subtext">Please enter your details</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="admin-input-group">
                        <label class="admin-input-label">Email address</label>
                        <input type="email" name="email" class="admin-text-input" placeholder="Enter Email" required>
                    </div>

                    <div class="admin-input-group">
                        <label class="admin-input-label">Password</label>
                        <input type="password" class="admin-text-input" name="password" placeholder="Enter Password"
                            required>
                    </div>
                    <!-- Turnstile -->
                    <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"
                        data-callback="enableSubmit" data-expired-callback="disableSubmit"></div>

                    @error('captcha')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="admin-extra-options">

                        <label>
                            <input type="checkbox" name="remember"> Remember for 30 days
                        </label>

                        <a href="{{ route('password.request') }}">Forgot password</a>

                    </div>

                    <button class="admin-signin-button" type="submit" id="loginBtn" disabled>Log In</button>



                    <!-- <div class="admin-signup-text">
                        Don't have an account? <a href="{{ route('register') }}">Register Now</a>
                    </div> -->

                </form>

            </div>

        </div>


        <!-- RIGHT IMAGE -->
        <div class="admin-login-image-area">

            <img src="{{ asset('admin/images/auth/02.jpg') }}">

            <div class="admin-image-text">
                <h3>Welcome back to your workspace.
                </h3>
                <p>Log in and continue where you left off.</p>
            </div>

        </div>

    </div>

    {{-- all the scripts will be placed there --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script>
        function enableSubmit() {
            document.getElementById('loginBtn').disabled = false;
        }

        function disableSubmit() {
            document.getElementById('loginBtn').disabled = true;
        }
    </script>
</body>

</html>