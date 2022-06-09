<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

use App\Models\User;
use App\Models\Post;

class PostComment extends Model
{
    use HasFactory;
    use HasTrixRichText;

        /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_avouch_posts";
    
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'post_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    // comments table in database
    protected $gaurded = [];

    /**
    * user who has commented
    *
    * @var string
    */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * post which has been commented.
    *
    * @var string
    */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
