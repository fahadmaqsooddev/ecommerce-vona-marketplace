<?php

namespace App\Livewire\Admin\Testimonials;

use Livewire\Component;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
class AddTestimonial extends Component
{
    public function render()
    {
        return view('livewire.admin.testimonials.add-testimonial');
    }

    public function save(): void
    {
       $this->validate(
            TestimonialRequest::rules(),
            TestimonialRequest::validationMessages()
       );

        Testimonial::store($this->heading, $this->description, $this->image);

        $this->reset(['heading', 'description', 'image']);
        $this->dispatch('close-modal');
        $this->dispatch('testimonial-saved');
    }
}
