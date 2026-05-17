<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\WithPagination;
#[Layout('admin_layouts.app', ['page_title' => 'Products List', 'title' => 'Products List'])]
class ProductsList extends Component
{

    use WithPagination;

    public string $search = '';

    #[On('product-saved')]
    #[On('product-updated')]

    public function render()
    {
        $products = Product::fetchData(
            pagination: true,
            perPage: 10,
            search: $this->search
        );
        return view('livewire.admin.products.products-list',compact('products'));
    }

    #[On('product-saved')]
    #[On('product-updated')]
    
    public function refresh(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->deleteProduct();
    }

}
