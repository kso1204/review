<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function store()
    {
        $data = request()->validate([
            'tagName' => '',
        ]);
        
        $tag = Tag::create($data);

        return response([], 201); 
    }
}
