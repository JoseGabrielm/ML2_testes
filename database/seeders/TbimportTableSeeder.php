<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TbimportTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbimport')->delete();
        
        \DB::table('tbimport')->insert(array (
            0 => 
            array (
                'id' => 7251,
                'pedido' => '4434926184',
                'usuario' => 'Brenda',
            ),
            1 => 
            array (
                'id' => 7252,
                'pedido' => '4435887102',
                'usuario' => 'Brenda',
            ),
            2 => 
            array (
                'id' => 7253,
                'pedido' => '4435937726',
                'usuario' => 'Brenda',
            ),
        ));
        
        
    }
}