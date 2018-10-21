<?php

use App\Repository\CompanyRepository;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
        $this->companyRepository = new CompanyRepository();
    }

    private function seedCompanies(int $numberOfCompanies)
    {
        for ($i = 0; $i < $numberOfCompanies; $i++) {
            $this->companyRepository->create([
               'name' => $this->faker->company
            ]);
        }
    }

    public function run()
    {
        $this->seedCompanies(100);
    }
}
