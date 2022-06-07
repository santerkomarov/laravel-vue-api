<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
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
            'equipment'=>$this->equipment,
            'mask'=>$this->mask,
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
