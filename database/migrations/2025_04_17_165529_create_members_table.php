<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('current_address');
            $table->text('permanent_address');
            $table->string('permanent_post')->nullable();
            $table->string('permanent_union')->nullable();
            $table->string('current_political_position')->nullable();
            $table->string('previous_political_position')->nullable();
            $table->string('voter_area_name')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('education')->nullable();
            $table->string('case_number')->nullable();
            $table->boolean('is_reason')->default(false);
            $table->text('purpose_statement')->nullable();
            $table->string('photo_path')->nullable();
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
        Schema::dropIfExists('members');
    }
}
