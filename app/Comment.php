<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  protected $fillable = ['description', 'task_id'];

  public function task()
  {
    return $this->belongsTo('App\Task');
  }
}
