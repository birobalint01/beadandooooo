<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestsSeeder extends Seeder

    /**
     * Run the database seeds.
     *
     * @return void
     */
{
    public function run()
    {
        $arr = [
            [
                'id' => 1,
                
                'nev' => 'Ali abdul aziz',
                
                'kor' => 33,
                
                'ticket_id' => 1
            ],
            [
                'id' => 2,
                
                'nev' => 'Luda laszlo',
                
                'kor' => 20,
                
                'ticket_id' => 1
            ],
            [
                'id' => 3,
                
                'nev' => 'Logan',
                
                'kor' => 3,
                
                'ticket_id' => 2
            ],
            [
                'id' => 4,
                
                'nev' => 'ferenc',
                
                'kor' => 18,
                
                'ticket_id' => 4
            ],
            [
                'id' => 4,
                
                'nev' => 'andrew tate',
                
                'kor' => 33,
                
                'ticket_id' => 5
            ],

        ];
        foreach ($arr as $item) {
            $Guest = Guest::firstOrNew([
                'id' => $item['id'],
            ]);

            foreach ($item as $key => $value) {
                $Guest->{$key} = $value;
            }
            ;
            
            $Guest->save();
        }
    }
}
