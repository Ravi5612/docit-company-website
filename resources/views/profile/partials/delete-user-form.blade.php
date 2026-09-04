<div class="card shadow-sm border-danger mb-4">

    <div class="card-header bg-danger text-white">
        <h5 class="mb-1 text-white">
            <i class="fe fe-trash me-2"></i> {{ __('Delete Account') }}
        </h5>
        <small >
            {{ __('Permanently remove your account and all associated data.') }}
        </small>
    </div>

    <div class="card-body">

        <p class="text-muted mb-4">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <x-danger-button
            class="btn btn-danger"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            <i class="fe fe-trash me-1"></i> {{ __('Delete Account') }}
        </x-danger-button>

    </div>

</div>


<!-- Modal -->
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

    <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
        @csrf
        @method('delete')

        <h5 class="mb-3">
            {{ __('Confirm Account Deletion') }}
        </h5>

        <p class="text-muted mb-4">
            {{ __('Once your account is deleted, all resources and data will be permanently removed. Please enter your password to confirm.') }}
        </p>

        <div class="mb-3">

            <label class="form-label">{{ __('Password') }}</label>

            <input
                id="password"
                name="password"
                type="password"
                class="form-control"
                placeholder="{{ __('Enter your password') }}"
            >

            <x-input-error
                :messages="$errors->userDeletion->get('password')"
                class="text-danger mt-1"
            />

        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">

            <x-secondary-button
                class="btn btn-light"
                x-on:click="$dispatch('close')"
            >
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="btn btn-danger">
                <i class="fe fe-trash me-1"></i> {{ __('Delete Account') }}
            </x-danger-button>

        </div>

    </form>

</x-modal>