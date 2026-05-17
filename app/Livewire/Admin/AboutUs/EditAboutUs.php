<?php

namespace App\Livewire\Admin\AboutUs;

use Livewire\Component;
use App\Models\AboutUs;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Http\Requests\Admin\AboutUsRequest;
#[Layout('admin_layouts.app', ['page_title' => 'Edit AboutUs', 'title' => 'Edit AboutUs'])]
class EditAboutUs extends Component
{

    use WithFileUploads;

    public int $aboutUsId;
    public string $heading = '';
    public string $description = '';
    public $image = null;
    public $currentImage = null;

    public function mount()
    {
        $aboutus = AboutUs::fetchData();
        if ($aboutus) {
            $this->aboutUsId    = $aboutus->id;
            $this->heading      = $aboutus->heading;
            $this->description  = $aboutus->description;
            $this->currentImage = $aboutus->image_url;
        }
    }

    public function save()
    {
        $this->validate(
            AboutUsRequest::rules(),
            AboutUsRequest::validationMessages()
        );

        $data = [
            'heading'     => $this->heading,
            'description' => $this->description,
        ];

        AboutUs::updateData($this->aboutUsId, $data, $this->image);

        session()->flash('success', 'Updated successfully!');
    }

    public function render()
    {
    
        return view('livewire.admin.about-us.edit-about-us');
    }
}
