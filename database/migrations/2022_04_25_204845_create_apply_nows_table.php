<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_nows', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->unsignedDouble('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('option')->nullable();
            $table->string('study')->nullable();
            $table->string('time')->nullable();
            $table->string('interest')->nullable();
            $table->string('hear')->nullable();
            $table->string('signature')->nullable();
            $table->string('nationality')->nullable();
            $table->unsignedDouble('passport_number')->nullable();
            $table->date('date')->nullable();
            $table->string('gender')->nullable();
            $table->string('state')->nullable();
            $table->string('country_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_address')->nullable();
            $table->string('emergency_contact_state')->nullable();
            $table->string('emergency_contact_email')->nullable();
            $table->string('emergency_contact_country_name')->nullable();
            $table->unsignedDouble('emergency_contact_number')->nullable();
            $table->string('program')->nullable();
            $table->string('other')->nullable();
            $table->string('checklist')->nullable();
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
        Schema::dropIfExists('apply_nows');
    }
}
