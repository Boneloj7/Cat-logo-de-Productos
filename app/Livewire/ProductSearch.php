<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\View\View;

class ProductSearch extends Component
{
    public $query = "";
    public $category = "";
    public $categories;

    public function mount(): void
    {
        $this->categories = Category::all();
    }



    public function render(): View
    {
        $products = Product::query()
            ->when($this->query, function ($query): void {
                $query->where('name', 'like', '%' . $this->query . '%');
            })
            ->when($this->category, function ($query): void {
                $query->where('category_id', $this->category);
            })
            ->paginate(3);
        return view('livewire.product-search', compact(var_name: 'products'));
    }
}