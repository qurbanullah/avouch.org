<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BuiltPackage extends Model
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
    protected $table = 'built_packages';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'base_name',
        'name',
        'slug',
        'version',
        'release',
        'distribution',
        'architecture',
        'description',
        'source_url',
        'license',
        'date_created',
        'provides',
        'conflicts',
        'groups',
        'group_id',
        'dependancies',
        'optional_dependancies',
        'make_dependancies',
        'check_dependancies',
        'required_by',
        'optional_required_by',
        'make_required_by',
        'check_required_by',
        'maintainers',
        'contributors',
        'installed_size',
        'files',
        'package_xml_file',
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

}
