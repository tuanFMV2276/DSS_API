<?php
namespace Modules\Admin\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Admin\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

