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


    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

//     for path the photo
//<img src="{{URL::asset($post->photo)}}" class="img-thumbnail" width="50" height="50" alt="...">
 //to
    //   <img class="img-jobs" src="{{$post->photo}}" class="img-thumbnail"  alt="...">--}}
    //                        </div>
//    public function getFeaturedAttribute($photo)
//    {
//        return asset($photo);
//    }

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
