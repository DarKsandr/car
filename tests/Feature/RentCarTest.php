<?php

namespace Tests\Feature;

use Faker\Factory;
use App\Models\Car;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Interfaces\TestErrorFieldsInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RentCarTest extends TestCase implements TestErrorFieldsInterface
{
    public function test_rent_and_release_car()
    {
        $method = 'get';
        $uri = route('api.rent_car', [], false);

        $car = Car::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        $response = $this->json($method, $uri, ['car_id' => $car->id, 'user_id' => $user->id]);
        $response
            ->assertOk()
            ->assertJsonStructure(['data']);

        /**
         * При повторном запросе будет ошибка
         */
        $response = $this->json($method, $uri, ['car_id' => $car->id, 'user_id' => $user->id]);
        $response
            ->assertJsonStructure(['errors']);



        /**
         * Прекращение аренды автомобиля
         */
        $uri = route('api.release_car', [], false);
        $response = $this->json($method, $uri, ['car_id' => $car->id]);
        $response
            ->assertOk()
            ->assertJsonStructure(['data']);

        /**
         * При повторном запросе будет ошибка
         */
        $response = $this->json($method, $uri, ['car_id' => $car->id]);
        $response
            ->assertJsonStructure(['errors']);
    }


    /**
     *
     * Попытка аренды несуществующего автомобиля
     *
     */
    public function test_rent_non_exiting_car()
    {
        $method = 'get';
        $uri = route('api.rent_car', [], false);

        $user = User::inRandomOrder()->first();

        $response = $this->json($method, $uri, ['car_id' => 5000000, 'user_id' => $user->id]);
        $response
            ->assertStatus(422)
            ->assertJsonStructure(self::ERROR_FIELDS_JSON_STRUCTURE);
    }


    /**
     *
     * Попытка аренды несуществующего автомобиля
     *
     */
    public function test_release_non_exiting_car()
    {
        $method = 'get';
        $uri = route('api.release_car', [], false);

        $response = $this->json($method, $uri, ['car_id' => 5000000]);
        $response
            ->assertStatus(422)
            ->assertJsonStructure(self::ERROR_FIELDS_JSON_STRUCTURE);
    }


    /**
     * Настройка окружения
     * Выполняется перед выполнением каждого теста
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();

        Artisan::call('config:clear');
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

        //        Spectator::using(storage_path('api-docs/api-docs.json'));
    }


    /**
     * Очистка окружения
     * Выполняется после каждого теста
     */
    public function tearDown(): void
    {
        Artisan::call('migrate:rollback');
        parent::tearDown();
    }
}
