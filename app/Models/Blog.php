<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public function __construct($title,$slug,$intro,$body)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
    }
    public static function all()
    {
        return collect(File::files(resource_path("blogs")))
         ->map(function ($file) {
            $obj=YamlFrontMatter::parseFile($file);
            return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
        });
    }
     
    public static function find($slug)
    {
        $blogs=static::all();
        return $blogs->firstWhere('slug', $slug);
    }
}