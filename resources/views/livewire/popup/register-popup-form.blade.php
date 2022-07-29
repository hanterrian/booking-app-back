<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Register') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-control @error('name')is-invalid @enderror" wire:model.lazy="name"/>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('email')is-invalid @enderror" type="email" wire:model.lazy="email"/>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control @error('password')is-invalid @enderror" type="password" wire:model.lazy="password"/>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Password confirmation') }}</label>
            <input id="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror" type="password" wire:model.lazy="password_confirmation"/>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input id="accept" class="form-check-input @error('accept')is-invalid @enderror" type="checkbox" wire:model.lazy="accept">
            <label for="accept" class="form-check-label">
                {{ __('Agree to terms and conditions') }}
            </label>
            @error('accept')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="button" class="btn btn-primary" wire:loading.remove wire:click.prevent="register">{{ __('Register') }}</button>
        <button type="button" class="btn btn-primary" wire:loading wire:target="register" disabled style="display: none">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('Register') }}
        </button>
    </div>
</div>
