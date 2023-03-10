<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatatableSlots extends Component
{
    public $tables;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tables)
    {
        $this->tables = $tables;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable-slots');
    }
}
