<?php

namespace Database\Seeders;

use App\Models\ResearchTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researchTopics = [
            ['name' => 'SMART ECONOMY'],
            ['name' => 'SMART EDUCATION'],
            ['name' => 'SMART ENVIRONMENT'],
            ['name' => 'SMART GOVERNMENT'],
            ['name' => 'SMART TOURISM'],
            ['name' => 'SMART HEALTHCARE'],
            ['name' => 'SMART ENERGY'],
            ['name' => 'SMART AGRICULTURE'],
            ['name' => 'lainnya'],
        ];

        ResearchTopic::insert($researchTopics);
    }
}
