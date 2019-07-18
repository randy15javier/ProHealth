<?php
use App\User;
use App\Doctor;
use App\Medical_Date;
use App\Receptionist;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Doctor::class, function (Faker\Generator $faker) {
   
    return [
        
        'doctor_code' => $faker->numberBetween($min = 1, $max = 100),
        'name' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(Medical_Date::class, function (Faker\Generator $faker) {
   
    return [
        
        'date' => $faker->date,
        'time' => $faker->time,
        'status' => $faker->randomElement([Medical_Date::CITA_ATENDIDA, Medical_Date::CITA_NO_ATENDIDA]),
        'observation' => $faker->text($maxNbChars = 100),
        'price' => $faker->numberBetween($min = 100, $max = 1000),
        'patient' => $faker->name,
    ];
});

$factory->define(Receptionist::class, function (Faker\Generator $faker) {
   
    return [
        
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
    ];
});


