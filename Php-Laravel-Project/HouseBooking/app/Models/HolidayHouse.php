<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayHouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'house_name', 'location','rooms_count', 'beds_count','holiday_house_type', 'image'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'location');
    }

    public function holidayType()
    {
        return $this->belongsTo(HolidayType::class, 'holiday_house_type');
    }
}
