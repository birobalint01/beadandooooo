<?php

namespace Database\Seeders;

use App\models\Tickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'id' => 1,

                'prefix' => 'nutella',

                'ar' => 1234,

                'kiadasi datum' => Carbon::parse("2012-03-21"),

                'max' => 5
            ],
            [
                'id' => 2,

                'prefix' => 'parizsi',

                'ar' => 9134,

                'kiadasi datum' => Carbon::parse("2001-01-10"),

                'max' => 9
            ],
            [
                'id' => 3,
                
                'prefix' => 'margarin',
                
                'ar' => 23111,
                
                'kiadasi datum' => Carbon::parse("1988-11-30"),
                
                'max' => 62
            ],
            [
                'id' => 4,
                
                'prefix' => 'benzin',
                
                'ar' => 4000000,
                
                'kiadasi datum' => Carbon::parse("2022-12-24"),
                
                'max' => 50
            ],
            [
                'id' => 5,
                
                'prefix' => 'kokain',
                
                'ar' => 950000,
                
                'kiadasi datum' => Carbon::parse("2002-02-24"),
                
                'max' => 50
            ],
        ];

        foreach ($arr as $item) {
            $ticket = Tickets::firstOrNew([
                'id' => $item['id'],
            ]);

            foreach ($item as $key => $value) {
                $ticket->{$key} = $value;
            }
            ;
            
            $ticket->save();
        }
}
}
