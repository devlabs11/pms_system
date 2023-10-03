<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstModel extends Model
{
    use HasFactory;

    protected $table = "gst_master";
    protected $guarded = [];
}
