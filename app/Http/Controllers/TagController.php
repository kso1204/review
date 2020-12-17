<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;

class TagController extends Controller
{
    //
    public function store()
    {
        $data = request()->validate([
            'data.attributes.tagName' => 'required',
        ]);
        
        $tag = Tag::create($data['data']['attributes']);

        return new TagResource($tag);
    }
}
