<?php

namespace App\Livewire\Admin\Blogs;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use App\Models\Blog;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\BlogRequest;

class EditBlog extends Component
{
    use WithFileUploads;

    public ?int $blogId = null;
    public string $heading = '';
    public string $description = '';
    public $image = null;
    public ?string $existingImage = null;

    protected function rules(): array
    {
        $rules = BlogRequest::rules();
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        return $rules;
    }

    protected function messages(): array
    {
        return BlogRequest::validationMessages();
    }

    #[On('load-blog')]

    public function loadBlog(int $id): void
    {
        $blog = Blog::findOrFail($id);

        $this->blogId    = $blog->id;
        $this->heading       = $blog->heading;
        $this->description   = $blog->description;
        $this->existingImage = $blog->image_url;

        $this->dispatch('edit-data-loaded');
    }

    public function update(): void
    {
        $this->validate();

        $blog = Blog::findOrFail($this->blogId);
        $blog->updateBlog($this->heading, $this->description, $this->image, $this->existingImage);

        $this->reset(['image']);
        $this->dispatch('close-edit-modal');
        $this->dispatch('blog-updated');
    }

    public function render()
    {
        return view('livewire.admin.blogs.edit-blog');
    }
}
