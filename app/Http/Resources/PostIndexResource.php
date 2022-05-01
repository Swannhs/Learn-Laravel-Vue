<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostIndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
