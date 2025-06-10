<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileReport extends Model
{
    protected $fillable = [
        'original_name', 'stored_name', 'report_id'
    ];
}
