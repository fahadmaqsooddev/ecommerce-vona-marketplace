<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
#[Layout('admin_layouts.app', ['page_title' => 'Dashboard', 'title' => 'Dashboard'])]

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
