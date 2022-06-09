<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuiltPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_avouch_packages')->create('built_packages', function (Blueprint $table) {
            $table->id();
            $table->string('base_name')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('version');
            $table->string('release');
            $table->string('distribution')->nullable();
            $table->string('architecture')->nullable();
            $table->text('description')->nullable();
            $table->text('source_url')->nullable();
            $table->text('license')->nullable();
            $table->string('date_created')->nullable();
            $table->text('provides')->nullable();
            $table->text('conflicts')->nullable();
            $table->string('groups')->nullable();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->text('dependancies')->nullable();
            $table->text('optional_dependancies')->nullable();
            $table->text('make_dependancies')->nullable();
            $table->text('check_dependancies')->nullable();
            $table->text('required_by')->nullable();
            $table->text('optional_required_by')->nullable();
            $table->text('make_required_by')->nullable();
            $table->text('check_required_by')->nullable();
            $table->text('maintainers')->nullable();
            $table->text('contributors')->nullable();
            $table->string('installed_size')->nullable();
            $table->longText('files')->nullable();
            $table->string('package_xml_file')->nullable();
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
        Schema::dropIfExists('built_packages');
    }
}
