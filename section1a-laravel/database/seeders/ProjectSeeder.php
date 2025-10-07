<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // A couple of hand-crafted examples
        Project::updateOrCreate(['name' => 'Website Revamp'], [
            'description' => 'Rebuild marketing site with new brand system.',
            'start_date'  => '2025-06-01',
            'end_date'    => '2025-07-15',
        ]);

        Project::updateOrCreate(['name' => 'Mobile App MVP'], [
            'description' => 'Best Mobile App for iOS/Android.',
            'start_date'  => '2025-07-01',
            'end_date'    => '2025-09-30',
        ]);

        // Plus some fakes
        Project::factory()->count(3)->create();
    }
}
