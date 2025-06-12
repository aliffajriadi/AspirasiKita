<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'code', 'title', 'description', 'name',  'phone_no', 'category_id', 'location', 'status', 'comment'
    ];

    public function file()
    {
        return $this->hasMany(FileReport::class, 'report_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
