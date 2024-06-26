<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'isFull' => $this->isFull,
            'trash_weight' => $this->trash_weight,
            'current_trash_weight' => $this->current_trash_weight,
            'bin_group_id' => $this->bin_group_id,
            'Created' => date_format(date_create($this->created_at), 'Y-m-d h:i:s a')
        ];
    }
}