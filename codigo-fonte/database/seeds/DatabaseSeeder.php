<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
			array('Técnico - Médio Integrado', 'Médio'));
		DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
			array('Tecnólogo - Graduação', 'Superior'));
		DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
			array('Licenciatura - Graduação', 'Superior'));
        DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
			array('Bacharel - Graduação', 'Superior'));
        DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
    		array('Pós-Graduação', 'Especialização'));
        DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
        	array('Pós-Graduação', 'Mestrado'));
        DB::insert('INSERT INTO nivels(nome, abreviatura) VALUES(?, ?)',
        	array('Pós-Graduação', 'Doutorado'));
    }
}
