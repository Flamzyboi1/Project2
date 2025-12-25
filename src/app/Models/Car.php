<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model {
    protected $fillable = ['manufacturer_id', 'car_type_id', 'model', 'car_name', 'year', 'image', 'description'];

    public function manufacturer(): BelongsTo {
        return $this->belongsTo(Manufacturer::class);
    }

    public function carType(): BelongsTo {
        return $this->belongsTo(CarType::class);
    }
}