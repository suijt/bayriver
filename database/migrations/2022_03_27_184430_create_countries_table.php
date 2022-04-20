<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('caption')->nullable();
            $table->string('dli_no')->nullable();
            $table->text('description')->nullable();
            $table->text('learning_outcome')->nullable();
            $table->text('learning_features')->nullable();
            $table->text('course_desc')->nullable();
            $table->text('financial_desc')->nullable();
            $table->text('handbook_desc')->nullable();
            $table->text('handbook_file')->nullable();
            $table->string('video_link')->nullable();
            $table->enum('status', array('active', 'in_active'))->nullable()->default('active');
            $table->enum('is_featured', array('yes', 'no'))->nullable()->default('no');
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('secondary_image')->nullable();
            $table->integer('order')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('last_updated_by')->nullable();
            $table->integer('last_deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('countries');
    }
}
