<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'description',
        'auother_name'
    ];

    public function user(){
        return $this->belongsTo(User::class,'auother_name','id');
    }
}
