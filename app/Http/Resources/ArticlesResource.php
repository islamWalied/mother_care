<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'publication_date' => $this->publication_date,
            'status' => $this->status,
            'author' => $this->author,
            'image' => $this->image,
            'category_id' => $this->category_id,
        ];
    }
}
