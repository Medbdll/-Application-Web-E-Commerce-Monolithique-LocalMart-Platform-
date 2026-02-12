<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $search = '';

    // Listeners for modal events
    protected $listeners = [
        'categorySaved' => '$refresh', // Refresh table after form save
        'editCategory' => 'edit',      // Open modal for editing
    ];

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
    }

    public function edit($id)
    {
        $this->emitTo('category-form', 'editCategory', $id);
    }

    public function render()
    {
        $query = Category::query();

        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('slug', 'like', "%{$this->search}%");
        }

        $categories = $query->latest()->paginate(10);

        return view('livewire.category-table', compact('categories'));
    }
}
