<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    public $table = 'get_website';
    use HasFactory;

    protected $fillable = [
        'websites_id',
        'status',
        'response', 
    ];

}
