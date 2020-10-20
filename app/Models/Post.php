<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    public  function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=[
        'user_id',
        'title',
        'content',
        'photo',
        'slug'
    ];
}
