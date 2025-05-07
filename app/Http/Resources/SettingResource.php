<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'stie_name' => $this->stie_name,
            'email' => $this->email,
            'favicon' => asset($this->favicon),
            'logo' => asset($this->logo),   
            'phone' => $this->phone,
            'facebook' => $this->facebook,
            'linkendin' => $this->linkendin,
            'twitter' => $this->twitter,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'smail_desc' => $this->smail_desc,
        ];
    }
}  