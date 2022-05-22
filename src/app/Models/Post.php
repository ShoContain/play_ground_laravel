<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    
   /**
    * Get the user that owns the Post
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    */
   public function images()
   {
       return $this->morphMany('App\Models\Image','imageable');
   }
}
