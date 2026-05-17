<?php

namespace App\Livewire\Admin\Testimonials;

use Livewire\Component;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class EditTestimonial extends Component
{
    use WithFileUploads;


    public ?int $blogId = null;
    public string $heading = '';
    public string $description = '';
    public $image = null;
    public ?string $existingImage = null;

    protected function rules(): array
    {
        $rules = TestimonialRequest::rules();
        $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048';
        return $rules;
    }

    protected function messages(): array
    {
        return TestimonialRequest::validationMessages();
    }

    #[On('load-testimonial')]

    public function loadTestimonial(int $id): void
    {
        $blog = Testimonial::findOrFail($id);

        $this->blogId    = $blog->id;
        $this->heading       = $blog->heading;
        $this->description   = $blog->description;
        $this->existingImage = $blog->image_url;

        $this->dispatch('edit-data-loaded');
    }

    public function update(): void
    {
        $this->validate();

        $testimonial = Testimonial::findOrFail($this->blogId);
        $testimonial->updateTestimonial($this->heading, $this->description, $this->image, $this->existingImage);

        $this->reset(['image']);
        $this->dispatch('close-edit-modal');
        $this->dispatch('testimonial-updated');
    }

    public function render()
    {
        return view('livewire.admin.testimonials.edit-testimonial');
    }
}
