<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Blog;
use Livewire\Attributes\On;
use Livewire\WithPagination;
#[Layout('admin_layouts.app', ['page_title' => 'Blogs List', 'title' => 'Blogs List'])]

class BlogsList extends Component
{
     use WithPagination;

    public string $search = '';

    public function render()
    {
        $blogs = Blog::fetchData(
            pagination: true,
            perPage: 10,
            search: $this->search
        );

        return view('livewire.admin.blogs.blogs-list',compact('blogs'));
    }

    #[On('blog-saved')]
    #[On('blog-updated')]

    public function refresh(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        $blog = Blog::findOrFail($id);
        $blog->deleteBlog();
    }
    
}
