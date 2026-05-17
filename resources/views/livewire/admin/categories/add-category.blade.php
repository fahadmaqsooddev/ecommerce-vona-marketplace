<div x-data="{ showModal: false }"
     x-on:open-modal.window="showModal = true"
     x-on:close-modal.window="showModal = false">

    <div x-show="showModal" style="display:none;">
        <div class="modal-backdrop fade show"></div>
        <div class="modal show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" @click="showModal = false">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        {{-- Heading --}}
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
                                      rows="4"
                                      placeholder="Enter description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file"
                                wire:model="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            {{-- Uploading Indicator --}}
                            <div wire:loading wire:target="image" class="text-muted small mt-1">
                                <span class="spinner-border spinner-border-sm text-primary"></span>
                                <span>Uploading, please wait...</span>
                            </div>

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Image Preview --}}
                            @if ($image && !$errors->has('image'))
                                <div class="mt-2">
                                    <img src="{{ $image->temporaryUrl() }}"
                                         alt="Preview"
                                         width="120"
                                         class="rounded border">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                @click="showModal = false">Close</button>

                        <button type="button"
                                wire:click="save"
                                wire:loading.attr="disabled"
                                wire:target="save, image"
                                class="btn btn-success"
                                @php $uploadDone = $image && !$errors->has('image') @endphp
                                {{ !$uploadDone ? 'disabled' : '' }}>
                            <span wire:loading.remove wire:target="save">Save</span>
                            <span wire:loading wire:target="save">Saving...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>