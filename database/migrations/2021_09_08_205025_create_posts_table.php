<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_avouch_posts')->create('posts', function (Blueprint $table) {
            $databaseUsers = DB::connection('mysql')->getDatabaseName();
            $databasePackages = DB::connection('mysql_avouch_packages')->getDatabaseName();

            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('introduction');
            $table->text('content');
            $table->boolean('is_active');
            $table->string('post_banner_image')->nullable();
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('group_id')->constrained()->cascadeOnDelete()->nullable();
            // $table->foreignId('package_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->on(new Expression($databaseUsers . '.users'));
            $table->foreignId('group_id')->constrained()->cascadeOnDelete()->nullable()->on(new Expression($databasePackages . '.groups'));
            $table->foreignId('package_id')->constrained()->cascadeOnDelete()->nullable()->on(new Expression($databasePackages . '.packages'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
