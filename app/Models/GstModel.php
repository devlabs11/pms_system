<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "gst_master";
    protected $guarded = [];
}