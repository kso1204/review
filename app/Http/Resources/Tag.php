<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'tags',
                'tag_id' => $this->id,
                'attributes' => [
                    'tagName' => $this->tagName,
                ],
                'links' => [
                    'self' => url('/tags/'.$this->id),
                ]
            ]
        ];
    }
}
