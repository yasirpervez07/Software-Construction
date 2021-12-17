<?php

namespace App\Http\Livewire\Component;

use App\Agency;
use App\Property;
use Carbon\Carbon;
use Livewire\Component;

class SingleDetail extends Component
{
    public $property;
    public $agency;
    public $relateditem;

    public function mount()
    {
        if (!is_null($this->property)) {
            $this->relateditem = Property::where('area_one_id', $this->property->areaOne->id)
                ->where('id', '!=', $this->property->id)
                ->where('type', $this->property->type)
                ->where('property_for', $this->property->property_for)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(8)
                ->get();
        }
        if (!is_null($this->agency)) {
            $this->relateditem = Agency::where('area_one_id', $this->agency->areaOne->id)
                ->where('id', '!=', $this->agency->id)
                ->orderBy('created_at', 'desc')
                ->inRandomOrder()
                ->take(8)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.component.single-detail');
    }
}
