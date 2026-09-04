<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-1">
            <i class="fe fe-lock me-2"></i> {{ __('Update Password') }}
        </h5>
        <small class="text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </small>
    </div>

    <div class="card-body">

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('Current Password') }}</label>

                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="form-control"
                    autocomplete="current-password"
                >

                <x-input-error
                    :messages="$errors->updatePassword->get('current_password')"
                    class="text-danger mt-1"
                />
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('New Password') }}</label>

                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="form-control"
                    autocomplete="new-password"
                >

                <x-input-error
                    :messages="$errors->updatePassword->get('password')"
                    class="text-danger mt-1"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('Confirm Password') }}</label>

                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="form-control"
                    autocomplete="new-password"
                >

                <x-input-error
                    :messages="$errors->updatePassword->get('password_confirmation')"
                    class="text-danger mt-1"
                />
            </div>

            <!-- Button -->
            <div class="mt-4">

                <button type="submit" class="btn btn-warning">
                    <i class="fe fe-save me-1"></i> {{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success ms-3"
                    >
                        {{ __('Password updated successfully.') }}
                    </span>
                @endif

            </div>

        </form>

    </div>

</div>