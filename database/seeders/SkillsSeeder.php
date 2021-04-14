<?php
    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class SkillsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $skillsBack = [
                [
                    'name' => 'PHP 7 & 8',
                    'is_bold' => true,
                ],
                [
                    'name' => 'Laravel',
                    'is_bold' => true,
                ],
                [
                    'name' => 'Symfony 5',
                    'is_bold' => true,
                ],
                [
                    'name' => 'ApiPlatform',
                    'is_bold' => false,
                ],
                [
                    'name' => 'Wordpress',
                    'is_bold' => false,
                ],
                [
                    'name' => 'PHP Unit',
                    'is_bold' => true,
                ],
                [
                    'name' => 'PHPStorm',
                    'is_bold' => true,
                ],
                [
                    'name' => 'VSCode',
                    'is_bold' => false,
                ],
                [
                    'name' => 'Ruby',
                    'is_bold' => false,
                ],
                [
                    'name' => 'Ruby on Rails',
                    'is_bold' => false,
                ],
                [
                    'name' => 'RSpec',
                    'is_bold' => false,
                ],
                [
                    'name' => 'Rubymine',
                    'is_bold' => false,
                ],
            ];
            foreach($skillsBack as $key => $skill) {
                DB::table('skills')->insert([
                    'name' => $skill['name'],
                    'is_bold' => $skill['is_bold'],
                    'position' => $key+1,
                    'type' => 'backend'
                ]);
            }
            $skillsFront = [
                [
                    "name" => "Javascript",
                    "is_bold" => true
                ],
                [
                    "name" => "Typescript",
                    "is_bold" => true
                ],
                [
                    "name" => "VueJS",
                    "is_bold" => true
                ],
                [
                    "name" => "Ionic",
                    "is_bold" => false
                ],
                [
                    "name" => "Angular",
                    "is_bold" => false
                ],
                [
                    "name" => "CSS / SCSS",
                    "is_bold" => false
                ],
                [
                    "name" => "Bootstrap / Bulma",
                    "is_bold" => false
                ],
                [
                    "name" => "WebStorm",
                    "is_bold" => true
                ],
            ];
            foreach($skillsFront as $key => $skill) {
                DB::table('skills')->insert([
                    'name' => $skill['name'],
                    'is_bold' => $skill['is_bold'],
                    'position' => $key+1,
                    'type' => 'frontend'
                ]);
            }

        }
    }

