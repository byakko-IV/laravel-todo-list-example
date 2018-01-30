<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageToArticles extends Migration
{
  public function up()
  {
    Schema::table('tasks', function($table){
      $table->string('image');
    });
  }

  public function down()
  {
    Schema::table('tasks', function($table){
      $table->dropColumn('image');
    });
  }
}
