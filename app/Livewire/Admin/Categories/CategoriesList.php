<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;
#[Layout('admin_layouts.app', ['page_title' => 'Categories List', 'title' => 'Categories List'])]

class CategoriesList extends Component
{
   
    use WithPagination;

    public string $search = '';

    public function render()
    {
       $categories = Category::fetchData(
            pagination: true,
            perPage: 10,
            search: $this->search
        );
        return view('livewire.admin.categories.categories-list',compact('categories'));
    }

    #[On('category-saved')]
    #[On('category-updated')]

    public function refresh(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->deleteCategory();
    }
}
