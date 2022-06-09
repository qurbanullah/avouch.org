<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
    * The database used by the model.
    *
    * @var string
    */
    // Note: default connection, it should not be used
    // if used, it will override all the DB::connection instances,
    // Which we donn't want to do.
    // protected $connection = "mysql";

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
    * roles
    * user has only one role at atime
    * @return void
    */
    public function roles()
    {
        return $this->hasOne(Role::class, 'user_id');
    }

    /**
    * packages
    * user has only one role at a time
    * @return void
    */
    public function maintainableGroups()
    {
        // return $this->morphedByMany(Group::class, 'maintainable', 'maintainables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(Group::class, 'maintainable', "$databasePackages.maintainables")->withTimestamps();

    }

    /**
    * packages
    * user has only one role at atime
    * @return void
    */
    public function maintainablePackages()
    {
        // return $this->morphedByMany(Package::class, 'maintainable', 'maintainables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(Package::class, 'maintainable', "$databasePackages.maintainables")->withTimestamps();

    }

    /**
    * packages
    * user has only one role at atime
    * @return void
    */
    public function maintainableBuiltPackages()
    {
        // return $this->morphedByMany(BuiltPackage::class, 'maintainable', 'maintainables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(BuiltPackage::class, 'maintainable', "$databasePackages.maintainables")->withTimestamps();
    }

        /**
    * packages
    * user has only one role at atime
    * @return void
    */
    public function contributableGroups()
    {
        // return $this->morphedByMany(Group::class, 'contributable', 'contributables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(Group::class, 'contributable', "$databasePackages.contributables")->withTimestamps();
    }

    /**
    * packages
    * user has only one role at atime
    * @return void
    */
    public function contributablePackages()
    {
        // return $this->morphedByMany(Package::class, 'contributable', 'contributables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(Package::class, 'contributable', "$databasePackages.contributables")->withTimestamps();
    }

    /**
    * packages
    * user has only one role at atime
    * @return void
    */
    public function contributableBuiltPackages()
    {
        // return $this->morphedByMany(BuiltPackage::class, 'contributable', 'contributables');

        $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();
        return $this->morphedByMany(BuiltPackage::class, 'contributable', "$databasePackages.contributables")->withTimestamps();
    }
}
