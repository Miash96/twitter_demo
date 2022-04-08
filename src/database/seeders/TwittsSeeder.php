<?php

namespace Database\Seeders;

use App\Models\Twitt;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TwittsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent_twitt=Twitt::create([
            'user_id'=>User::query()->inRandomOrder()->first()->id,
            'parent_id'=>null,
            'text'=>Str::random('200')
        ]);

        $parent_twitts = Twitt::query()->where('parent_id', '=', null)->get();

        foreach ($parent_twitts as $parent_twitt){

            $child_twitt=Twitt::create([
                'user_id'=>User::query()->inRandomOrder()->first()->id,
                'parent_id'=>$parent_twitt->id,
                'text'=>Str::random('200')
            ]);
        }
    }
}
