<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
        'title',
        'content',
        'slug',
    ];
    static public function generateSlug($str) {
        $originalSlug = Str::of($str)->slug('-')->__toString();
        $slug = $originalSlug;
        $i = 1;
        while (self::where('slug', $slug)->first()) {
            $slug = "$originalSlug-$i";
            $i++;
        }
        return $slug;
    }

}
