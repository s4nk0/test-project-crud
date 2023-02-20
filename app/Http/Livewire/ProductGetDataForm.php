<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGetDataForm extends Component
{
    use WithPagination;

    public $search;
    public $addedProducts = [];
    public $selected_products;
    public $resource;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function mount($selected_products = null,$resource = null){
        $this->resource = $resource;
        $this->selected_products = $selected_products;
        if ($this->selected_products){
            foreach ( $this->selected_products as $product){

                $this->addedProducts[$product->id] = $product;
                $this->addedProducts[$product->id]['count'] = $product->pivot->count;
            }
        }


    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function addProduct($product_id){
        if (array_key_exists($product_id,$this->addedProducts)){
            unset($this->addedProducts[$product_id]);
        }else{
            $this->addedProducts[$product_id] = Product::find($product_id);
        }

    }

    public function render()
    {
        $products = Product::search($this->search)->paginate(30);

        return view('livewire.product-get-data-form', compact('products'));
    }
}
