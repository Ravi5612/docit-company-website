<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('admin/images/logo/fav.png')}}" type="image/png">



</head>

<body>

    <div class="authx-page-wrapper">

        <div class="authx-register-card">

            <div class="authx-title">Sign Up</div>
            <div class="authx-title-line"></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="authx-field-group">

                    <x-text-input id="name" class="authx-field-input" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" placeholder="Name" />

                    <x-input-error :messages="$errors->get('name')" class="authx-error" />

                </div>


                <!-- Email -->
                <div class="authx-field-group">

                    <x-text-input id="email" class="authx-field-input" type="email" name="email" :value="old('email')"
                        required autocomplete="username" placeholder="Email id" />

                    <x-input-error :messages="$errors->get('email')" class="authx-error" />

                </div>


                <!-- Password -->
                <div class="authx-field-group">

                    <x-text-input id="password" class="authx-field-input" type="password" name="password" required
                        autocomplete="new-password" placeholder="Password" />

                    <x-input-error :messages="$errors->get('password')" class="authx-error" />

                </div>


                <!-- Confirm Password -->
                <div class="authx-field-group">

                    <x-text-input id="password_confirmation" class="authx-field-input" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Confirm Password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="authx-error" />

                </div>


                <div class="authx-small-link">
                    <a href="{{ route('login') }}">Already registered?</a>
                </div>


                <div class="authx-button-row">

                    <button type="submit" class="authx-register-btn">
                        Register
                    </button>

                  

                </div>
            </form>

        </div>

    </div>

</body>

</html>