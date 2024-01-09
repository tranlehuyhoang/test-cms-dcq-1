<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('task_comments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('task_id');
            $table->tinyInteger('create_by');
            $table->string('content');
            $table->tinyInteger('reply_id');
            $table->timestamps(); // Thêm cột 'created_at' và 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_comments');
    }
}
