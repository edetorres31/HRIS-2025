<?php

namespace Database\Factories;

use App\Enums\Department;
use App\Enums\EmployeeStatus;
use App\Enums\EmploymentType;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'birthdate' => fake()->date(),
            'gender' => fake()->randomElement(Gender::values()),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'emergency_contact_name' => fake()->name(),
            'emergency_contact_number' => fake()->phoneNumber(),
            'hire_date' => fake()->date(),
            'employment_type' => fake()->randomElement(EmploymentType::values()),
            'position' => fake()->optional()->jobTitle(),
            'department' => fake()->randomElement(Department::values()),
            'status' => fake()->randomElement(EmployeeStatus::values()),
        ];
    }
}
