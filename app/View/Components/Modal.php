<?php

namespace App\View\Components;



use Illuminate\View\Component;

class Modal extends Component
{
    public $isOpen;
    public function __construct($isOpen = false)
    {
      $this->isOpen = boolval($isOpen);

    }

    public function render()
    {
        return view('components.modal');
    }
}
