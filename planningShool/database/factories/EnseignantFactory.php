<?php

namespace Database\Factories;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * @var string
     */

    protected $model = Enseignant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_Enseignant' => $this->faker->lastName,
            'prenom_Enseignant' => $this->faker->firstName,
            'email' => $this->faker->email,
            'adresse' => $this->faker->phoneNumber,
            'created_at' => now(),
        ];
    }
}
