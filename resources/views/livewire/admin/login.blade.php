<div class="login-form wmin-sm-400 mt-5">
    <div class="card mb-0">
        <div class="card-body">
            <h3 class="text-center mb-3">Admin panel</h3>
			 <!-- Display invalid login error -->
            @if($errorMessage)
                <div class="alert alert-danger">
                    {{ $errorMessage }}
                </div>
            @endif

            <form wire:submit.prevent="login" autocomplete="off">
                <div class="form-group">
                    <input type="text" wire:model="email" class="form-control" placeholder="Email">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <input type="password" wire:model="password" class="form-control" placeholder="Password">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" wire:loading.attr="disabled">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>