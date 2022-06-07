<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEquipment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'equipment',
        'mask',
    ];
    /**
     * Get the equipments for equipment type.
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
