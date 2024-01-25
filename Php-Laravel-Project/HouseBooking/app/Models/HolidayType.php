<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayType extends Model
{
    use HasFactory;

    protected $fillable = [
        'holiday_type_name',
    ];

    public function holidayHouse()
    {
        return $this->hasOne(HolidayHouse::class, 'holiday_house_type');
    }
}
