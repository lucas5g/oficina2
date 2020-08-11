<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'client' => 'Lucas de Sousa',
            'salesman' => 'Marcos Assunção',
            'description' => 'Troca de óleo',
            'value' => 120.00 ,
            'created_at' => date('Y-m-d h:i'),
            'updated_at' => date('Y-m-d h:i'),
                        
        ]);
        //

    }
}
