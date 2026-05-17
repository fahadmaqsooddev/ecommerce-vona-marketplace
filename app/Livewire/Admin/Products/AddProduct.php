<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Facades\Log;

class AddProduct extends Component
{
    use WithFileUploads;

    public $heading;
    public $description;
    public $image;
    public $category_id;
    public $price;
    public $gender = '';
    public $discount;

    public function save()
    {
    
        $this->validate(array_merge(ProductRequest::rules(), [
            'image' => 'required|image|max:2048',
        ]), ProductRequest::validationMessages());

        Product::store([
            'heading'     => $this->heading,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price'       => $this->price,
            'gender'      => $this->gender,
            'discount'    => $this->discount,
            'image'       => $this->image,
        ]);

        $this->reset();
        $this->dispatch('close-modal');
        $this->dispatch('product-saved');
    }

    public function render()
    {
        $categories=Category::fetchData(false,null,null);
        return view('livewire.admin.products.add-product',compact('categories'));

    }
}
