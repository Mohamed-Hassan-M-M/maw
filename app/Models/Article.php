<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'body', 'image', 'file', 'time_to_read', 'status'];
    protected $appends = ['file_path', 'image_path'];

    //attr
    public function getFilePathAttribute()
    {
        return Storage::url('uploads/' . $this->file);

    }// end of getFilePathAttribute

    public function getImagePathAttribute()
    {
        return Storage::url('uploads/' . $this->image);

    }// end of getFilePathAttribute

    //scope
    public function scopeWhenStatus($query, $status)
    {
        return $query->when($status, function ($q) use ($status) {

            return $q->where('status', $status);

        });

    }// end of scopeWhenStatus

    public function scopeWhenCategoryId($query, $categoryId)
    {
        return $query->when($categoryId, function ($q) use ($categoryId) {

            return $q->where('category_id', $categoryId);

        });

    }// end of scopeWhenCategoryId

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {

            return $q->where('title', 'like', "%$search%");

        });

    }// end of scopeWhenSearch

    //rel
    public function category()
    {
        return $this->belongsTo(Category::class);

    }// end of category

}//end of model
