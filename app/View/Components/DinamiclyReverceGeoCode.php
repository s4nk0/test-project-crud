<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DinamiclyReverceGeoCode extends Component
{
    public $coords;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($coords)
    {
        $this->coords = $coords;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dinamicly-reverce-geo-code');
    }
}
