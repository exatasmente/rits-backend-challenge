<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PedidoStatus extends Component
{
    public $textColor;
    public $bgColor;
    public $status;
    public function __construct($status,$statusStr)
    {
        $this->init($status);
        $this->status = $statusStr;

    }

    public function init($status){

        switch ($status){
            case 1:
                 $this->textColor = 'text-orange-800';
                 $this->bgColor  = 'bg-orange-200';
                break;
            case 2:
                $this->textColor = 'text-yellow-800';
                $this->bgColor  = 'bg-yellow-200';
                break;
            case 3:
                $this->textColor = 'text-blue-800';
                $this->bgColor  = 'bg-blue-200';
                break;
            case 4:
                $this->textColor = 'text-green-800';
                $this->bgColor  = 'bg-green-200';
                break;
            case 5:
                $this->textColor = 'text-red-800';
                $this->bgColor  = 'bg-red-100';
                break;
        }

    }
    public function render()
    {
        return view('components.pedido-status');
    }
}
