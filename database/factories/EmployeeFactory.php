<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
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
        $positions = [
            'Software Engineer', 'Data Analyst', 'Project Manager', 'Business Analyst',
            'UI/UX Designer', 'DevOps Engineer', 'QA Engineer', 'System Administrator',
            'Network Engineer', 'Database Administrator', 'Product Manager', 'Scrum Master',
            'Technical Lead', 'Cloud Architect', 'Security Analyst', 'HR Specialist',
            'Finance Manager', 'Marketing Specialist', 'Operations Manager', 'Recruitment Officer',
        ];

        return [
            'name'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'position'   => $this->faker->randomElement($positions),
            'department' => $this->faker->randomElement(['IT', 'Finance', 'HR', 'Marketing', 'Operations']),
        ];
    }
}
