<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Mind Controlling',
                'code' => 'RED'
            ],
            [
                'name' => 'Shapeshifting',
                'code' => 'YELLOW'
            ],
            [
                'name' => 'Healing Factor',
                'code' => 'GREEN'
            ],
            [
                'name' => 'Teleportation',
                'code' => 'BLUE'
            ]
        ];

        foreach ($groups as $key => $value) {
            Group::create([
                'name' => $value['name'],
                // 'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value['name']), '-')),
                'slug' => str()->slug($value['name']),
                'code' => $value['code'],
            ]);
        }
    }
}
