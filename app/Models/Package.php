<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

use Illuminate\Support\Facades\DB;

class Package extends Model implements Sitemapable
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
    protected $table = 'packages';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'base_name',
        'short_description',
        'long_description',
        'banner_image',
        'images',
        'thumbnail',
        'is_active',
        'groups',
        'group_id',
    ];

    // restrics column from modifying
    protected $gaurded = [];

    /**
     * Get the group that owns the Package
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

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
        return route('packages.package-info-component', $this->slug);
    }

}
