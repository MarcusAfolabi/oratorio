<?php

namespace App\Livewire;

use Livewire\Component;

class Reg extends Component
{
    public $name;
    public $email;
    public $phone;
    public $department;
    public $level;
    public $campus;
    

    public function render()
    {
        return view('livewire.reg');
    }
}
