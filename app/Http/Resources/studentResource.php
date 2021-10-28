<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class studentResource extends JsonResource
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
            "username" => $this->username,
            "email" => $this->email,
            "fullName" => $this->fullName,
            "role" => $this->role,
            "role_id" => $this->role_id,
            "birthday"=> $this->birthday,
            "gender"=> $this->gender,
            "active" => $this->active,
            "address" => $this->address,
            "class" => $this->class->className,
            "section" => $this->section->sectionName,
            "section_title" => $this->section->sectionTitle,
            "religion" => $this->religion,
            "photo"=> $this->photo,
            "phoneNo"=>$this->phoneNo,
            "mobileNo"=>$this->mobileNo
        ];
    }
}
