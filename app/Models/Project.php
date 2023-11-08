<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'thumb', 'description', 'content', 'slug'];

    protected function thumb(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (strstr($value, 'http') !== false) {
                    return $value;
                } else {
                    return asset('storage/' . $value);
                }
            }
        );
    }
}
