<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * The "equipment" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'equipment';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type_equipment'=>$this->type_equipment,
            'serial_number'=>$this->serial_number,
            'comment'=>$this->comment
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
