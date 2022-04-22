<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('caption')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', array('active', 'in_active'))->nullable()->default('active');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
