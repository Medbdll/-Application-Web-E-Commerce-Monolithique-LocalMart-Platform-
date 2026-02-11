<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderStatus extends Component
{
    public $order;
    public $status;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->status = $order->status;
    }

    public function updatedStatus($value)
    {
        $this->order->update(['status' => $value]);
    }
    
    public function render()
    {
        return view('livewire.order-status');
    }
}
