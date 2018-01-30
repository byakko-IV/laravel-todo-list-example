<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
  return [
    'description' => $faker->paragraph,
    'task_id' => function () {
      return factory(\App\Task::class)->create()->id;
    }
  ];
});
