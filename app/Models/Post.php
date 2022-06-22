<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

use App\Models\User;

class Post extends Model implements Sitemapable
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
    protected $table = 'posts';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title',
        'slug',
        'introduction',
        'content',
        'is_active',
        'post_banner_image',
        'user_id',
        'group_id',
        'package_id',
        'post-trixFields',
        'attachment-post-trixFields',
    ];


    // restrics column from modifying
    protected $gaurded = [];

    // posts has many comments
    // returns all coments on that post
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }

    /**
    * post belongs to user
    *
    * @return void
    */
    public function author()
    {
        $databaseMain = DB::connection('mysql')->getDatabaseName();
        return $this->belongsTo(User::class, "$databaseMain.users");
        // return $this->belongsTo(User::class, 'user_id');
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('posts.post-detail-component', $this->slug);
    }
}
