<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Component;
use App\Http\Requests\Admin\BlogRequest;
use Livewire\WithFileUploads;
use App\Models\Blog;
class AddBlog extends Component
{

    use WithFileUploads;
    public $heading, $description, $image;

    public function render()
    {
        return view('livewire.admin.blogs.add-blog');
    }

    public function save(): void
    {
       $this->validate(
            BlogRequest::rules(),
            BlogRequest::validationMessages()
       );

        Blog::store($this->heading, $this->description, $this->image);

        $this->reset(['heading', 'description', 'image']);
        $this->dispatch('close-modal');
        $this->dispatch('blog-saved');
    }
}
