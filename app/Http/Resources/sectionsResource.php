<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class sectionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "sectionName" => $this->sectionName,
            "sectionTitle" => $this->sectionTitle,
            "class_id" => $this->classe_id,
        ];
    }
}
