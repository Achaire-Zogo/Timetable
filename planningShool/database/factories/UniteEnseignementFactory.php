<?php

namespace Database\Factories;
use App\Models\UniteEnseignement;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniteEnseignementFactory extends Factory
{
    /**
     * @var string
     */

    protected $model = UniteEnseignement::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code_ue' => $this->faker->word,
            'nom_ue' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'id_enseignant' => $this->faker->randomDigit,
        ];
    }
}
