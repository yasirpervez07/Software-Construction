<?php

namespace App\Http\Livewire\Section;

use App\Property;
use Livewire\Component;
use Livewire\WithPagination;

class FeatureProperties extends Component
{
    use WithPagination;
    public $featureproperties;


    public function mount()
    {
        $this->featureproperties = Property::with('images','areaOne','areaTwo')->where('priority', 3)->take(6)->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.section.feature-properties');
    }
}
