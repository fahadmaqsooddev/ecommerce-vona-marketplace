<div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                {{-- Header --}}
                <div class="p-3">
                    {{-- Title --}}
                    <div class="mb-2">
                        <h5 class="mb-0 fw-bold">Products</h5>
                    </div>

                    {{-- Search + Button --}}
                    <div class="d-flex align-items-center gap-2">

                        {{-- Search --}}
                        <div class="input-group" style="max-width: 350px;">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text"
                                   wire:model.live.debounce.400ms="search"
                                   class="form-control border-start-0"
                                   placeholder="Search...">
                            @if($search)
                                <button class="btn btn-outline-secondary"
                                        wire:click="$set('search', '')">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        </div>

                        {{-- Spacer --}}
                        <div class="flex-grow-1"></div>

                        {{-- Add Button --}}
                        <button class="btn btn-success flex-shrink-0"
                                @click="$dispatch('open-modal')">
                            <i class="fas fa-plus"></i>
                            <span class="d-none d-sm-inline"> Add Product</span>
                        </button>

                    </div>
                </div>

                {{-- Global Loading --}}
                <div wire:loading class="text-center py-4">
                    <span class="spinner-border text-primary"></span>
                    <p class="text-muted mt-2">Please wait...</p>
                </div>

                <div wire:loading.remove>
                    <div class="row m-2 g-3">
                        @if($products && $products->count())
                            @foreach($products as $rec)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">

                                        {{-- Image --}}
                                        <div style="position: relative;">
                                            <img src="{{ $rec->image_url }}"
                                                 alt="{{ $rec->heading }}"
                                                 style="width:100%; height:180px; object-fit:cover;">

                                            {{-- Category Badge --}}
                                            <span class="badge badge-primary"
                                                  style="position: absolute; top: 10px; left: 10px; font-size: 11px; padding: 5px 10px; border-radius: 20px;">
                                                {{ $rec->category->heading }}
                                            </span>
                                        </div>

                                        {{-- Card Body --}}
                                        <div class="card-body d-flex flex-column p-3">
                                            <h6 class="font-weight-bold mb-1">{{ $rec->heading }}</h6>
                                            <p class="text-muted small flex-grow-1 mb-0">{{ $rec->description }}</p>
                                        </div>

                                        {{-- Buttons --}}
                                        <div class="d-flex px-3 pb-3" style="gap: 10px;">
                                            {{-- Edit Button --}}
                                            <button class="btn btn-warning btn-sm flex-fill"
                                                    style="border-radius: 8px;"
                                                    @click="$dispatch('open-edit-modal', { id: {{ $rec->id }} }); $wire.dispatchTo('admin.products.edit-product', 'load-product', { id: {{ $rec->id }} })">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </button>

                                            {{-- Delete Button --}}
                                            <button class="btn btn-danger btn-sm flex-fill"
                                                    style="border-radius: 8px;"
                                                    wire:click="delete({{ $rec->id }})"
                                                    wire:confirm="Are you sure you want to delete this product?"
                                                    wire:loading.attr="disabled"
                                                    wire:target="delete({{ $rec->id }})">
                                                <span wire:loading.remove wire:target="delete({{ $rec->id }})">
                                                    <i class="fas fa-trash mr-1"></i> Delete
                                                </span>
                                                <span wire:loading wire:target="delete({{ $rec->id }})">
                                                    <i class="fas fa-spinner fa-spin"></i> Deleting...
                                                </span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5 w-100">
                                <i class="fas fa-folder-open fa-3x text-muted"></i>
                                <p class="text-muted mt-3">
                                    @if($search)
                                        No results for "<strong>{{ $search }}</strong>"
                                    @else
                                        No Products Found
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Pagination --}}
                    @if($products && $products->hasPages())
                        <div class="d-flex flex-wrap justify-content-between align-items-center px-3 mt-3 mb-3 gap-2">
                            <small class="text-muted">
                                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
                                of {{ $products->total() }} results
                            </small>
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    @livewire('admin.products.add-product')
    @livewire('admin.products.edit-product')
</div>