<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Http\Requests\Admin\CategoryRequest;
class AddCategory extends Component
{
    use WithFileUploads;

    public $heading, $description, $image;

    public function save(): void
    {
      
        $this->validate(
            CategoryRequest::rules(),
            CategoryRequest::validationMessages()
        );

        Category::store($this->heading, $this->description, $this->image);

        $this->reset(['heading', 'description', 'image']);
        $this->dispatch('close-modal');
        $this->dispatch('category-saved');
    }

    public function render()
    {
        return view('livewire.admin.categories.add-category');
    }
}