<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_name',
        'model',
        'manufacturer_id',
        'car_type_id',
        'year',
        'image',
        'description',
        'display'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}