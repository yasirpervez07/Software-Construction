<?php

namespace App\View\Components;

use Illuminate\View\Component;

class search extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $property_types, $areaones, $areatwos, $areathrees;

    public function __construct($title, $property_types, $areaones, $areatwos, $areathrees)
    {
        $this->title = $title;
        $this->property_types = $property_types;
        $this->areaones = $areaones;
        $this->areatwos = $areatwos;
        $this->areathrees = $areathrees;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search');
    }
}
