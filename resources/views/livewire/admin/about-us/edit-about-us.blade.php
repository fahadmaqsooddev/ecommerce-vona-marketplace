<div class="mt-3">

  
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-group mb-3">
        <label>Heading</label>
        <input type="text"
               wire:model="heading"
               class="form-control @error('heading') is-invalid @enderror"
               placeholder="Enter heading">
        @error('heading')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Description --}}
    <div class="form-group mb-3">
        <label>Description</label>
        <textarea wire:model="description"
                  class="form-control @error('description') is-invalid @enderror"
                  rows="5" cols="10"
                  placeholder="Enter description"></textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="form-group mb-3">
        <label>Image</label>

        {{-- Current Image --}}
        @if ($currentImage && !$image)
            <div class="mb-2">
                <p class="text-muted small">Current Image:</p>
                <img src="{{ $currentImage }}"
                    alt="{{ $heading }}"
                    width="120"
                    class="rounded border">
            </div>
        @endif

        <input type="file"
            wire:model="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*">

        <div wire:loading wire:target="image" class="text-muted small mt-1">
            <span class="spinner-border spinner-border-sm text-primary"></span>
            Uploading, please wait...
        </div>

        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

        {{-- New Image Preview --}}
        @if ($image && !$errors->has('image'))
            <div class="mt-2">
                <p class="text-muted small">New Image Preview:</p>
                <img src="{{ $image->temporaryUrl() }}"
                    alt="Preview"
                    width="120"
                    class="rounded border">
            </div>
        @endif
    </div>

    {{-- Submit Button --}}
    <button type="button"
            wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save, image"
            class="btn btn-success">
        <span wire:loading.remove wire:target="save">Update</span>
        <span wire:loading wire:target="save">Updating...</span>
    </button>
    
</div>