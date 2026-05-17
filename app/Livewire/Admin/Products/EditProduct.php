<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use App\Http\Requests\Admin\ProductRequest;

class EditProduct extends Component
{
    use WithFileUploads;

    public int $productId;
    public $heading;
    public $description;
    public $image;
    public $existingImage;
    public $category_id;
    public $price;
    public $gender = '';
    public $discount;

   

    protected function rules(): array
    {
        $rules = ProductRequest::rules();
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        return $rules;
    }

    protected function messages(): array
    {
        return ProductRequest::validationMessages();
    }

    #[On('load-product')]
    public function loadProduct(int $id): void
    {
        $product = Product::findOrFail($id);

        $this->productId     = $product->id;
        $this->heading       = $product->heading;
        $this->description   = $product->description;
        $this->category_id   = $product->category_id;
        $this->price         = $product->price;
        $this->gender        = $product->gender;
        $this->discount      = $product->discount;
        $this->existingImage = $product->image_url;
        $this->image         = null;

      
        $this->dispatch('edit-data-loaded');
    }

    public function save(): void
    {

       $this->validate(ProductRequest::rules());

        Product::updateProduct($this->productId, [
            'heading'     => $this->heading,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price'       => $this->price,
            'gender'      => $this->gender,
            'discount'    => $this->discount,
            'image'       => $this->image,
        ]);

        $this->dispatch('close-modal');
         $this->dispatch('product-updated');
        session()->flash('success', 'Product updated successfully.');
    }

    public function render()
    {
        $categories = Category::orderBy('heading')->get();
        return view('livewire.admin.products.edit-product', compact('categories'));
    }
}