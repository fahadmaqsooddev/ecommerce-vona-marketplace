<div x-data="{ showModal: false }"
     x-on:open-modal.window="showModal = true"
     x-on:close-modal.window="showModal = false">

    <div x-show="showModal" style="display:none;">
        <div class="modal-backdrop fade show"></div>
        <div class="modal show d-block" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
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
                                   placeholder="Enter product heading"
                                   required
                                   maxlength="255">
                            @error('heading')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="form-group mb-3">
                            <label>Category</label>
                            <select wire:model="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->heading }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea wire:model="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Enter description"
                                      required></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Price & Discount (side by side) --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number"
                                               wire:model="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               placeholder="0.00"
                                               step="0.01"
                                               min="0"
                                               required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Discount <span class="text-muted small">(optional, %)</span></label>
                                    <div class="input-group">
                                        <input type="number"
                                               wire:model="discount"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               placeholder="0.00"
                                               step="0.01"
                                               min="0"
                                               max="100">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <div class="d-flex gap-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           wire:model="gender"
                                           id="genderMale"
                                           value="male"
                                           required>
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"
                                           type="radio"
                                           wire:model="gender"
                                           id="genderFemale"
                                           value="female"
                                           required>
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div class="form-group mb-3">
                            <label>Image</label>
                            <input type="file"
                                wire:model="image"
                                class="form-control @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                                required>

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
                                @click="
                                    let inputs = Array.from($el.closest('.modal-content').querySelectorAll('[required]'));
                                    let firstInvalid = inputs.find(el => !el.value);
                                    if (firstInvalid) {
                                        firstInvalid.reportValidity();
                                    } else {
                                        $wire.save();
                                    }
                                "
                                wire:loading.attr="disabled"
                                wire:target="save, image"
                                class="btn btn-success">
                            <span wire:loading.remove wire:target="save">Save</span>
                            <span wire:loading wire:target="save">Saving...</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>