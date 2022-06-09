<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;


class Group extends Model implements Sitemapable
{
    use HasFactory;

    /**
    * The database used by the model.
    *
    * @var string
    */
    protected $connection = "mysql_avouch_packages";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'groups';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'banner_image',
        'images',
        'thumbnail',
        'is_active',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    // Polumorphic relationship
    public function maintainers()
    {
        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphToMany(User::class, 'maintainable', "$databasePackages.maintainables")->withTimestamps();
    }

    public function contributors()
    {
        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphToMany(User::class, 'contributable', "$databasePackages.contributables")->withTimestamps();
    }

    public function toSitemapTag(): Url | string | array
    {
        return route('packages.packages-group-detail-component', $this->slug);
    }
}
