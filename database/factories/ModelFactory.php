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
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => '$2y$10$lcg22GUn8q7ZsP7jWhLaw.MIuvgv/OEZfxaxB6qRvonx/4HgdEhCe',
        'remember_token' => str_random(10),
        'role_id' => 1,
        'position_id' => 1,
        'branch_id' => 1,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'city' => 'denpasar',
        'province' => 'bali',
        'country' => 'indonesia',
        'zipcode' => $faker->postcode,
        'image' => 'user.jpg',
        'active' => 1
    ];
});

$factory->define(App\PostCategoryLanguage::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'category_id' => 1,
        'status' => 1
    ];
});

$factory->define(App\Testimmony::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->sentence($nbWords = 3, $variableNbWords = true)
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [        
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => '$2y$10$lcg22GUn8q7ZsP7jWhLaw.MIuvgv/OEZfxaxB6qRvonx/4HgdEhCe',
        'remember_token' => str_random(10),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'city' => 'denpasar',
        'province' => 'bali',
        'country' => 'indonesia',
        'zipcode' => $faker->postcode,
        'image_profile' => 'customer.jpg',
        'newsletter' => 1,
        'active' => 1
    ];
});

$factory->define(App\Branch::class, function (Faker\Generator $faker) {
    return [
        'name' => 'denpasar',
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = true)
    ];
});

$factory->define(App\PostCategory::class, function (Faker\Generator $faker) {
    return [
        'parent' => 0,
        'order' => 1
    ];
});

$factory->define(App\PostLanguage::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->sentence($nbWords = 10, $variableNbWords = true)
    ];
});

$factory->define(App\Property::class, function (Faker\Generator $faker) {
    return [
        'category_id' => 1,
        'price' => $faker->randomNumber(7),
        'discount' => $faker->randomNumber(2),
        'type' => $faker->randomElement($array = array ('for sale', 'for rent')),
        'publish' => $faker->randomElement($array = array ('draft', 'moderation', 'publish')),
        'building_size' => $faker->randomNumber(2),
        'land_size' => $faker->randomNumber(3),
        'floor' => $faker->randomNumber(1),
        'bedroom' => $faker->randomNumber(1),
        'bathroom' => $faker->randomNumber(1),
        'garden' => $faker->randomElement($array = array ('0', '1')),
        'pool' => $faker->randomElement($array = array ('0', '1')),
        'ac' => $faker->randomElement($array = array ('0', '1')),
        'heater' => $faker->randomElement($array = array ('0', '1')),
        'kitchen' => $faker->randomElement($array = array ('0', '1')),
        'garage' => $faker->randomElement($array = array ('0', '1')),
        'car_port' => $faker->randomElement($array = array ('0', '1')),
        'sold' => $faker->randomElement($array = array ('0', '1')),
        'status' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'year' => $faker->year($max = 'now'),
        'view' => $faker->randomDigit
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'parent' => 0,
        'order' => 1,
    ];
});

$factory->define(App\CategoryLanguage::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});

$factory->define(App\PropertyLanguage::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
