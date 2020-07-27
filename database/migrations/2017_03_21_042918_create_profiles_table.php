<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('theme_id')->unsigned()->default(1);
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->string('location')->nullable();
            $table->string('medipracticename')->nullable();
            $table->string('speciality')->nullable();
            $table->string('yearofmediprac')->nullable();
            $table->string('placeofwork')->nullable();
            $table->string('addressofpow')->nullable();
            $table->string('contact')->nullable();
            $table->string('workemail')->nullable();
            $table->string('cv_attachment')->nullable();
            $table->string('attachment1')->nullable();
            $table->string('attachment2')->nullable();
            $table->string('attachment3')->nullable();
            $table->string('attachment4')->nullable();
            $table->string('attachment5')->nullable();
            $table->string('attachment6')->nullable();
            $table->string('attachment7')->nullable();
            $table->string('attachment8')->nullable();
            //paitents
            $table->string('age')->nullable();
            $table->string('dofb')->nullable();
            $table->string('maritalstatus')->nullable();
            $table->string('religion')->nullable();
            $table->string('occuption')->nullable();
            $table->string('nofkin')->nullable();
            $table->string('nofkinrelationship')->nullable();
            $table->string('nofkinrelationshipcontact')->nullable();
            $table->text('chronicillness')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medication_suppliments')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('avatar_status')->default(0);

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
        Schema::dropIfExists('profiles');
    }
}
