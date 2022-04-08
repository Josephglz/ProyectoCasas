<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $file = new Filesystem;
        $file->cleanDirectory(public_path('uploads/images/'));
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('casa_id')->constrained()->onDelete('cascade');
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
        $file = new Filesystem;
        $file->cleanDirectory(public_path('uploads/images/'));
        Schema::dropIfExists('images');
    }
};
