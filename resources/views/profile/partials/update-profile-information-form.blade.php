<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-1">
            <i class="fe fe-user me-2"></i> {{ __('Profile Information') }}
        </h5>
        <small class="text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </small>
    </div>

    <div class="card-body">

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $user->name) }}"
                       required
                       autofocus
                       autocomplete="name">

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}"
                       required
                       autocomplete="username">

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mb-3 p-3 border rounded bg-light">

                <span class="badge bg-warning text-dark mb-2">
                    {{ __('Email not verified') }}
                </span>

                <p class="small text-muted mb-2">
                    {{ __('Your email address is unverified.') }}
                </p>

                <button form="send-verification" class="btn btn-sm btn-outline-primary">
                    {{ __('Resend Verification Email') }}
                </button>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2 mb-0 py-2">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif

            </div>
            @endif

            <!-- Button -->
            <div class="mt-4">

                <button type="submit" class="btn btn-primary">
                    <i class="fe fe-save me-1"></i> {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success ms-3">
                        {{ __('Saved successfully') }}
                    </span>
                @endif

            </div>

        </form>

    </div>
</div>