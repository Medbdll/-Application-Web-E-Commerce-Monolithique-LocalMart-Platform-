<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryForm extends Component
{
    public $showModal = false;
    public $categoryId;
    public $name;
    public $slug;
    public $description;

    protected $listeners = [
        'openCategoryModal' => 'openModal',
        'editCategory' => 'loadCategory'
    ];

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'description' => 'nullable|string',
    ];

    public function openModal()
    {
        $this->resetInputFields();
        $this->showModal = true;
    }

    public function loadCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->description = $category->description;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function resetInputFields()
    {
        $this->categoryId = null;
        $this->name = '';
        $this->slug = '';
        $this->description = '';
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $this->categoryId,
            'description' => 'nullable|string',
        ]);

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
            ]
        );

        $this->dispatch('categorySaved'); // refresh table
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
