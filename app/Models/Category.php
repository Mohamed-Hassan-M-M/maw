<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image', 'views_count'];
    protected $appends = ['image_path'];

    //attr
    public function getImagePathAttribute()
    {
        return Storage::url('uploads/' . $this->image);

    }// end of getImagePathAttribute

    //scope

    //rel
    public function articles()
    {
        return $this->hasMany(Article::class);

    }// end of articles

}//end of model
