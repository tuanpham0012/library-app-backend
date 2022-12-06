<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code ?? '',
            'name' => $this->name ?? '',
            'date_of_birth' => $this->date_of_birth ?? '',
            'country' => $this->country ?? '',
            'story' => $this->story ?? '',
            'image' => $this->image ?? '',
        ];
    }
}
