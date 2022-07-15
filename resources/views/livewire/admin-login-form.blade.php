<div class="row">
    <div class="row">
        <div class="col-12">
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <div class="col mx-auto my-3 col-3">
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" wire:model="email" id="email" class="form-control"/>
                @error('email') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" wire:model="password" id="password" class="form-control"/>
                @error('password') <span class="text-danger error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <button type="submit" wire:click.prevent="login" class="btn btn-primary col-12">Log In</button>
            </div>
        </form>
    </div>
</div>
