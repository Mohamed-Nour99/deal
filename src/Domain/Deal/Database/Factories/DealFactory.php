<?php

namespace Src\Domain\Deal\Database\Factories;

use Src\Domain\Deal\Entities\Deal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
