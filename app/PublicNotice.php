<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicNotice extends Model
{
    protected $fillable=[
        'id',
        'agency_id',
        'area_one_id',
        'area_two_id',
        'area_three_id',
        'property_number',
        'size',
        'size_type',
        'number',
    ];

    public function areaOne()
    {
        return $this->belongsTo(AreaOne::class,'area_one_id');
    }
    public function areaTwo()
    {
        return $this->belongsTo(AreaTwo::class,'area_two_id');
    }
    public function areaThree()
    {
        return $this->belongsTo(AreaThree::class,'area_three_id');
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class,'agency_id');
    }

}
