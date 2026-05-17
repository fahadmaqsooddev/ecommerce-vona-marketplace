<div x-data="{ showModal: false, isLoading: false }"
     x-on:open-edit-modal.window="showModal = true; isLoading = true"
     x-on:close-edit-modal.window="showModal = false; isLoading = false"
     x-on:edit-data-loaded.window="isLoading = false">

    <div x-show="showModal" x-cloak>
        <div class="modal-backdrop fade show"></div>
        <div class="modal show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Blog</h5>
                        <button type="button" class="close" @click="showModal = false">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        {{-- Loading --}}
                        <div x-show="isLoading" class="text-center py-4">
                            <span class="spinner-border text-primary"></span>
                            <p class="text-muted mt-2">Loading...</p>
                        </div>

                        {{-- Actual Content --}}
                        <div x-show="!isLoading">

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

                                {{-- Existing Image --}}
                                @if ($existingImage && !$image)
                                    <div class="mb-2">
                                        <img src="{{ $existingImage }}"
                                             alt="Current Image"
                                             width="120"
                                             class="rounded border">
                                        <p class="text-muted small mt-1">Current image</p>
                                    </div>
                                @endif

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

                                {{-- New Image Preview --}}
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

                    </div>

                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                @click="showModal = false">Close</button>

                        <button type="button"
                                wire:click="update"
                                wire:loading.attr="disabled"
                                wire:target="update, image"
                                class="btn btn-success"
                                :disabled="isLoading">
                            <span wire:loading.remove wire:target="update">Update</span>
                            <span wire:loading wire:target="update">Updating...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>