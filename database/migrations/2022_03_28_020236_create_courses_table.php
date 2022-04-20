<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('set null')->onDelete('set null');
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onUpdate('set null')->onDelete('set null');
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('set null')->onDelete('set null');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('caption')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('study_option')->nullable();
            $table->string('work_placement')->nullable();
            $table->string('credential')->nullable();
            $table->string('industrial_demand')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('professional_level')->nullable();
            $table->string('program_type')->nullable();
            $table->text('learning_outcome')->nullable();
            $table->text('learning_features')->nullable();
            $table->text('prerequisite_desc')->nullable();
            $table->text('prerequisite_subdesc')->nullable();
            $table->text('financial_desc')->nullable();
            $table->text('industrial_desc')->nullable();
            $table->string('video_link')->nullable();
            $table->enum('status', array('active', 'in_active'))->nullable()->default('active');
            $table->enum('is_featured', array('yes', 'no'))->nullable()->default('no');
            $table->enum('is_program', array('yes', 'no'))->nullable()->default('no');
            $table->enum('is_affiliated', array('yes', 'no'))->nullable()->default('no');
            $table->enum('is_continious', array('yes', 'no'))->nullable()->default('no');
            $table->enum('is_international', array('yes', 'no'))->nullable()->default('no');
            $table->string('image')->nullable();
            $table->string('secondary_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('icon_image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
