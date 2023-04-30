<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
      return
        [
            'id' => $this->id,
            'author' => $this->author->name,
            'title' => $this->title,
            'slug' => $this->slug,
            'published_at' => Carbon::parse($this->published_at)->format('d-m-Y'),
            'content' => $this->content,
            'category' => $this->category->categories,
            'featured_image' => config('services.env_url.url').'/storage/'.$this->featured_image_path
        ];
    }
}
