<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductTable extends Component
{
    public $search = '';
    public $category = '';

    protected $listeners = ['productSaved' => '$refresh'];

    public function delete($id)
    {
        Product::find($id)->delete();
    }

    public function suspend($id)
    {
        $product = Product::find($id);
        $product->update(['status' => $product->status === 'active' ? 'inactive' : 'active']);
    }

    public function toggleVerified($sellerId)
    {
        if (auth()->user()->hasRole('admin')) {
            $user = \App\Models\User::find($sellerId);
            $newStatus = $user->verified === 'verified' ? 'not verified' : 'verified';
            $user->update(['verified' => $newStatus]);
        }
    }

    public function render()
    {
        $query = Product::with(['user', 'category']);

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%");
        }

        if ($this->category) {
            $query->where('category_id', $this->category);
        }

        if (auth()->user()->hasRole('seller')) {
            $query->where('user_id', auth()->id());
        }

        $products = $query->latest()->get()->map(function($product) {
            return (object)[
                'id' => $product->id,
                'name' => $product->name,
                'sku' => 'SKU-' . $product->id,
                'image' => $product->image,
                'category' => $product->category->name ?? 'Uncategorized',
                'condition' => $product->status === 'active' ? 'New' : 'Pre-Owned',
                'seller_id' => $product->user_id,
                'seller_name' => $product->user->name ?? 'Unknown',
                'seller_avatar' => null,
                'seller_verified' => $product->user->verified === 'verified',
                'seller_type' => $product->user->verified === 'verified' ? 'Verified Partner' : 'Community Seller',
                'seller_rating' => 5,
                'seller_sales' => rand(10, 5000),
                'price' => $product->price,
                'price_type' => 'Retail Price',
                'stock' => $product->stock,
                'status' => $product->status,
                'listed_at' => $product->created_at->diffForHumans(),
            ];
        });

        $categories = Category::all();

        return view('livewire.product-table', compact('products', 'categories'));
    }
}
