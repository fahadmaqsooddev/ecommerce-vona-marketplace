<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Requests\Admin\CategoryRequest;

class EditCategory extends Component
{
    use WithFileUploads;

    public ?int $categoryId = null;
    public string $heading = '';
    public string $description = '';
    public $image = null;
    public ?string $existingImage = null;

    

    protected function rules(): array
    {
        $rules = CategoryRequest::rules();
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        return $rules;
    }

    protected function messages(): array
    {
        return CategoryRequest::validationMessages();
    }

    #[On('load-category')]
    public function loadCategory(int $id): void
    {
        $category = Category::findOrFail($id);

        $this->categoryId    = $category->id;
        $this->heading       = $category->heading;
        $this->description   = $category->description;
        $this->existingImage = $category->image_url;

        $this->dispatch('edit-data-loaded');
    }

    public function update(): void
    {
        $this->validate();

        $category = Category::findOrFail($this->categoryId);
        $category->updateCategory($this->heading, $this->description, $this->image, $this->existingImage);

        $this->reset(['image']);
        $this->dispatch('close-edit-modal');
        $this->dispatch('category-updated');
    }

    public function render()
    {
        return view('livewire.admin.categories.edit-category');
    }
}