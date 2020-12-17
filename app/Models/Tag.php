<?php

namespace App\Models;

use App\Scopes\ReverseScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ReverseScope());
    }
    
}
