<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('admin/images/logo/fav.png')}}" type="image/png">



</head>

<body>

    <div class="authx-page-wrapper">

        <div class="authx-register-card">

            <div class="authx-title">Forgot Password</div>
            <div class="authx-title-line"></div>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset link that will allow you to choose a new one.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email -->
                <div class="authx-field-group">

                    <x-text-input id="email" class="authx-field-input" type="email" name="email" :value="old('email')"
                        required autocomplete="username" placeholder="Email id" />

                    <x-input-error :messages="$errors->get('email')" class="authx-error" />

                </div>




                <div class="authx-button-row">

                    <button type="submit" class="authx-register-btn">
                        Get Email Password Reset Link
                    </button>


                </div>
            </form>

        </div>

    </div>

</body>

</html>