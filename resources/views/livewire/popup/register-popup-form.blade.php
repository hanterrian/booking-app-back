<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Register') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        ...
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
        <button type="button" class="btn btn-primary" wire:loading.remove wire:click.prevent="register">{{ __('Register') }}</button>
        <button type="button" class="btn btn-primary" wire:loading disabled style="display: none">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('Register') }}
        </button>
    </div>
</div>
