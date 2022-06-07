<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type_equipment',
        'serial_number',
        'comment',
    ];

    /**
     * Get the equipments that owns the equipment_type.
     */
    public function typeEquipment()
    {
        return $this->belongsTo(TypeEquipment::class);
    }
}
