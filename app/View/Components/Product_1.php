<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product_1 extends Component
{
    private $title, $description, $price, $curency;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $description, $price, $curency)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->curency = $curency;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $description = $this->description;
        $price = $this->price;
        $currency = $this->curency;
        return view('components.product-1', compact('title', 'description', 'price', 'currency'));
    }
}
