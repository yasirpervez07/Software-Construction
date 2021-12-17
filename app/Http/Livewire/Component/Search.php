<?php

namespace App\Http\Livewire\Component;

use App\Agency;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\City;
use App\Http\Resources\AreaOneCollection;
use App\Http\Resources\AreaThreeCollection;
use App\Http\Resources\AreaTwoCollection;
use App\Property;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Search extends Component
{
    use WithPagination;

    public $search;
    public $searchproperties;
    public $propertiesitem;
    public $area;
    public $area_id;
    public $suggestions = [];
    public $loadmorecount = 8;
    public $total;
    public $agencies;
    public $searchagencies;


    public function mount(Request $request, $search)
    {
        $this->search = $search;
        if ($search == 'agency') {
            $this->agencies = Agency::take(8)->get();
            $this->total = Agency::count();
        }
        if ($search == 'property') {
            $this->propertiesitem = Property::with('areaOne', 'areaTwo', 'images')->take(8)->get();
            $this->total = Property::count();
            if (isset($request->searched)) {
                $str = explode(',', $request->searched);
                $this->area = $str[0];
                $this->area_id = $str[1];
                $this->propertiesitem = Property::with('areaOne', 'areaTwo', 'images')->where($this->area, $this->area_id)->take(8)->get();
                $this->total = Property::where($this->area, $this->area_id)->count();
                // $a = collect(Property::where($area, $area_id)->paginate(4)); //for future
                // $this->propertiesitem = $a;
            }
        }
    }

    public function search($whatto)
    {
        if ($whatto == 'property') {
            $suggestion = cache()->remember('propertiessearch', Carbon::now()->addMinutes(60), function () {
                $areaones = AreaOne::where('id', '!=', null);
                $areatwos = AreaTwo::where('id', '!=', null);
                $areathrees = AreaThree::where('id', '!=', null);
                $city = City::find(1);
                $seacrh = $city->name;
                $areaones = $areaones->whereHas('city', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                });
                $areatwos = $areatwos->whereHas('area_one', function ($query) use ($seacrh) {
                    $query->whereHas('city', function ($query) use ($seacrh) {
                        $query->where('name', 'like', '%' . $seacrh . '%');
                    });
                });
                $areathrees = $areathrees->whereHas('area_one', function ($query) use ($seacrh) {
                    $query->whereHas('city', function ($query) use ($seacrh) {
                        $query->where('name', 'like', '%' . $seacrh . '%');
                    });
                });
                $a = new AreaOneCollection($areaones->get());
                $b = new AreaTwoCollection($areatwos->get());
                $c = new AreaThreeCollection($areathrees->get());


                $a = json_decode(json_encode($a));
                $b = json_decode(json_encode($b));
                $c = json_decode(json_encode($c));
                return array_merge($a, $b, $c,);
            });
            $this->suggestions = $this->searchproperties != null ?
                collect($suggestion)->filter(
                    function ($item) {
                        return false !== stristr($item->name, $this->searchproperties);
                    }
                )
                : [];
        }

        if ($whatto == 'agency') {
            $agencies = Agency::where('id', '!=', null);
            $this->agencies = $agencies->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaOne', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaTwo', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('user', function ($query) {
                $query->where('phone', $this->searchagencies);
            })->orWhere('name', 'like', '%' . $this->searchagencies . '%')
                ->take(8)->get();
                
            $this->total = $agencies->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaOne', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaTwo', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('user', function ($query) {
                $query->where('phone', $this->searchagencies);
            })->orWhere('name', 'like', '%' . $this->searchagencies . '%')
                ->count();
        }
    }

    public function elementChange($element)
    {
        $this->searchproperties = $element;
        $this->suggestions = [];
    }

    public function searchProperty()
    {
        $suggestion = cache()->get('propertiessearch');
        $val = $this->searchproperties != null ?
            collect($suggestion)->where('name', $this->searchproperties)->first()
            : null;
        if ($val != null) {
            return redirect()->action(
                'Customer\PropertyController@index',
                ['searched' => $val->key]
            );
        }
    }

    public function loadmore(Request $request, $from)
    {
        $count = $this->loadmorecount;
        $this->loadmorecount = $count + 8;

        if ($from == 'agency') {
            $agencies = Agency::where('id', '!=', null);
            $this->agencies = $agencies->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaOne', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('areaTwo', function ($query) {
                $query->where('name', 'like', '%' . $this->searchagencies . '%');
            })->orWhereHas('user', function ($query) {
                $query->where('phone', $this->searchagencies);
            })->orWhere('name', 'like', '%' . $this->searchagencies . '%')
                ->take($this->loadmorecount)->get();
        }
        if ($from == 'property') {
            isset($request->seacrhed) ? Property::with('areaOne', 'areaTwo', 'images')->take($this->loadmorecount)->get()
                : $this->propertiesitem = Property::with('areaOne', 'areaTwo', 'images')->where($this->area, $this->area_id)->take($this->loadmorecount)->get();
        }
    }

    public function render()
    {
        return view('livewire.component.search');
    }
}
