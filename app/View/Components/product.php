<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    public $title;
    public $product;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param array $product
     * @return void
     */
    public function __construct($title, $product)
    {
        $this->title = $title;
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }
}

