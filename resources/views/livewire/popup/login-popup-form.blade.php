<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Login') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control @error('password')is-invalid @enderror" type="email" wire:model="email"/>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control @error('password')is-invalid @enderror" type="password" wire:model="password"/>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input id="remember" class="form-check-input" type="checkbox" wire:model="rememberMe">
            <label for="remember" class="form-check-label">
                {{ __('Remember me') }}
            </label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="button" class="btn btn-primary" wire:loading.remove wire:click.prevent="login">{{ __('Login') }}</button>
        <button type="button" class="btn btn-primary" wire:loading wire:target="login" disabled style="display: none">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('Login') }}
        </button>
    </div>
</div>
