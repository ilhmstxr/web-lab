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
            ['name' => 'SMART ECONOMY'], //1
            ['name' => 'SMART EDUCATION'], //2
            ['name' => 'SMART ENVIRONMENT'], //3
            ['name' => 'SMART GOVERNMENT'], //4
            ['name' => 'SMART TOURISM'], //5
            ['name' => 'SMART HEALTHCARE'], //6
            ['name' => 'SMART ENERGY'], //7
            ['name' => 'SMART AGRICULTURE'], //8
            ['name' => 'lainnya'], //9
        ];

        ResearchTopic::insert($researchTopics);
    }
}
