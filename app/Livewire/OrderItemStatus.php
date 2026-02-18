<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;

class OrderItemStatus extends Component
{
    // Use the Model type hint for better IDE support
    public OrderItem $orderItem;
    public $status;

    protected $rules = [
        'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
    ];

    public function mount($itemId)
    {
        // Use findOrFail so it 404s if the ID is wrong
        // Use first() or find() instead of get() to get a single object
        $this->orderItem = OrderItem::with('product')->findOrFail($itemId);
        
        // Initialize the status so the dropdown matches the DB
        $this->status = $this->orderItem->status;
    }

    public function updateStatus()
    {
        $this->validate();
        
        // Security Check
        $isSeller = auth()->user()->hasRole('seller');
        $ownsProduct = $this->orderItem->product->user_id === auth()->id();

        if (!$isSeller || !$ownsProduct) {
            abort(403, 'Unauthorized');
        }

        $this->orderItem->update([
            'status' => $this->status
        ]);

        // Livewire 3 Dispatch Syntax
        $this->dispatch('status-updated', 
            message: "Item status updated to {$this->status}",
            itemId: $this->orderItem->id,
            status: $this->status
        );
    }

    public function render()
    {
        return view('livewire.order-item-status');
    }
}