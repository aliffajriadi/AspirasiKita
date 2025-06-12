<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'code', 'title', 'description', 'name',  'phone_no', 'category_id'
    ];

    public function file()
    {
        return $this->hasMany(FileReport::class, 'report_id', 'id');
    }
}
