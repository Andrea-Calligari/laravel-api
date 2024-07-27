<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Type;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $ids = $types->pluck('id')->all();

        $technologies = Technology::all();
        $tech_ids = $technologies->pluck('id')->all();

        $real_projects = [
            [
                'project_name' => 'TodoList',
                'description' => 'Ho creato una Todo-List con la possibilità di aggiungere, modificare ed eliminare le Todo desiderate.',
                'working_hours' => '4',
                'co_workers' => '',
                'type_id' => 1,
                'technologies'=> '4',
            ],
            [
                'project_name' => 'StayHub',
                'description' => ' StayHub è una piattaforma per chi cerca alloggi per le vacanze o vuole mettere un annuncio.Gli utenti possono creare, modificare, eliminare o promuovere i propri appartamenti',
                'working_hours' => '730',
                'co_workers' => ['Antonino Cicala', 'Carmine Doronzo','Marina Lasorsa', 'Orlando Manfredini'],
                'type_id' => '1','2',
                'technologies'=> ['1','2','3','5','6'],


            ],
            [
                'project_name' => 'Boolflix',
                'description' => 'Boolflix é un sito dove si possono cercare film e serie tv preferiti , con la possibilita di vederne le statistiche in quanto votazione descrizione lingua e attori.',
                'working_hours' => '6',
                'co_workers' => '',
                'type_id' => '1','2',
                'technologies'=> ['1','2','3','5','6'],


            ],
            [
                'project_name' => 'Snake',
                'description' => 'Semplice replica dello storico gioco Snake per tenersi in allenamento  ',
                'working_hours' => '5',
                'co_workers' => '',
                'type_id' => 1,
                'technologies'=> ['1','2','3'],


            ]

        ];
            foreach($real_projects as $project_data){
                $new_project = new Project();
                $new_project->type_id = $project_data['type_id'];
                $new_project->project_name = $project_data['project_name'];
                $new_project->slug = Str::slug($project_data['project_name']);
                $new_project->description = $project_data['description'];
                $new_project->working_hours = $project_data['working_hours'];
                $new_project->co_workers = json_encode($project_data['co_workers']);
                $new_project->save();
                $new_project->technologies()->attach($project_data['technologies']);


            }
        // for ($i = 0; $i < 10; $i++) {

        //     $new_project = new Project();
        //     // $new_project->type_id = Type::inRandomOrder()->first()->id;
        //     $new_project->type_id = $faker->optional()->randomElement($ids);
           

        //     $project_name = $faker->sentence(6);
        //     $new_project->project_name = $project_name;
        //     $new_project->slug = Str::slug($project_name);
        //     $new_project->description = $faker->sentence(5);
        //     $new_project->working_hours = $faker->randomDigitNot(0);
        //     $new_project->co_workers = $faker->name();


        //     // non ha ancora un id il progetto
        //     $new_project->save();
            
            
        //     // prendo un numero random di id di technologies
        //     $random_tech_ids = $faker->randomElements($tech_ids);
            
        //     // qui éstato salvato gli viene ora assegnato un id
        //     $new_project->technologies()->attach($random_tech_ids);
    
        // }

    }
}
