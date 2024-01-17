<?php

namespace App\Http\Resources\Contentful;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        dd($this);
        return [
            'id' => $this['items']['sys']['id'],
            'title' => $this['fields']['storyTitle'],
            'sub_heading' => $this['fields']['subHeading'],
            'author' => $this['fields']['author'],
            'body' => $this['fields']['body'],
            'date' => $this['fields']['datePublished'],
        ];
    }
}
