<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableAllDeleteButton extends Component
{
    private $title, $model;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $model)
    {
        $this->title = $title;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $model = $this->model;
         return view('components.table-all-delete-button', compact('title', 'model'));
    }
}
