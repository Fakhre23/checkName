<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedWord extends Model
{
    use HasFactory;

    protected $table = 'reserved_words';
    
    protected $fillable = ['word'];

}
