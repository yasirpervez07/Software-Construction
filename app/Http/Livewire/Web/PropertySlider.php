<?php

namespace App\Http\Livewire\Web;

use App\Property;
use Carbon\Carbon;
use Livewire\Component;

class PropertySlider extends Component
{
    public $values = [];

    public function mount()
    {
        $properties = cache()->remember('propertiesall', Carbon::now()->addMinutes(60), function () {
            return Property::all();
        });

        $this->values['industrial'] = $properties->where('type', 'Industrial')->count();
        $this->values['residential'] = $properties->where('type', 'Residential')->count();
        $this->values['commercial'] = $properties->where('type', 'Commercial')->count();
        $this->values['for_sale'] = $properties->where('property_for', 'For Sale')->count();
        $this->values['for_rent'] = $properties->where('property_for', 'For Rent')->count();
        $this->values['for_buy'] = $properties->where('property_for', 'For Buy')->count();
        $this->values['for_booking'] = $properties->where('property_for', 'For Booking')->count();
    }

    public function render()
    {
        return view('livewire.web.property-slider');
    }
}
