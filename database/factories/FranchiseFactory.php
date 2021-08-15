<?php

namespace Database\Factories;

use App\Models\Franchise;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class FranchiseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Franchise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        // $province = Region::select('code', 'name')
        //     ->whereRaw('CHAR_LENGTH(code)=2')
        //     ->orderBy('name')
        //     ->get();
        $distric = [
            "KAB. BEKASI",
            "KAB. BANDUNG",
            "KAB. CIANJUR",
            "KAB. CIREBON",
            "KAB. GARUT",
        ];


        return [
            'owner' => $this->faker->name(),
            'name' => "kongdjie" . $this->faker->name(),
            'province' => "Jawa Barat",
            'district' => $distric[array_rand($distric)],
            'subdistrict' => $distric[array_rand($distric)],
            'village' => $distric[array_rand($distric)],
            'address' => $this->faker->address(),
        ];
    }
}
