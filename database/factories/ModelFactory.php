<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'role' => $faker->word,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->word,
        'describtion' => $faker->text,
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 51)
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'describtion' => $faker->text,
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 30, $max = 1000),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'menu_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\Meal::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'describtion' => $faker->text,
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 30, $max = 1000),
        'user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'city' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'password' => bcrypt(str_random(10))
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'total' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 1000),
        'cashIn' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 1000),
        'payment' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 200),
        'change' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 200),
        'status' => $faker->boolean,
        //'customer_id' => $faker->numberBetween($min = 1, $max = 200)
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'describtion' => $faker->text,
        'status' => $faker->boolean,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'rate' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 5),
        'customer_id' => $faker->numberBetween($min = 1, $max = 50),
        'order_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\MealItem::class, function (Faker\Generator $faker) {
    return [
        'discount' => $faker->numberBetween($min = 1, $max = 100),
        'meal_id' => $faker->numberBetween($min = 1, $max = 50),
        'item_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\OrderItem::class, function (Faker\Generator $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 50),
        'item_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\OrderMeal::class, function (Faker\Generator $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 50),
        'meal_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});

$factory->define(App\OrderUser::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'order_id' => $faker->numberBetween($min = 1, $max = 50),
        'type' => $faker->word
    ];
});
