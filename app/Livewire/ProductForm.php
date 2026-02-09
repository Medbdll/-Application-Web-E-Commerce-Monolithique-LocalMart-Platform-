<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;
    
    public $productId = null;
    public $name = '';
    public $description = '';
    public $price = '';
    public $stock = '';
    public $category_id = '';
    public $image;
    public $showModal = false;

    protected $listeners = ['openProductModal' => 'openModal'];

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $imageName, 'public');
            $validated['image'] = 'storage/images/' . $imageName;
        }

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'active';

        if ($this->productId) {
            Product::find($this->productId)->update($validated);
        } else {
            Product::create($validated);
        }

        $this->reset();
        $this->showModal = false;
        $this->dispatch('productSaved');
    }

    public function openModal($id = null)
    {
        if ($id) {
            $product = Product::find($id);
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->category_id = $product->category_id;
        }
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.product-form', [
            'categories' => Category::all()
        ]);
    }
}
