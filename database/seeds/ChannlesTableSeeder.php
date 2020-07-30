<?php

use Illuminate\Database\Seeder;
use App\Channle;
use Illuminate\Support\Str;


class ChannlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channle::create([
            'name'=>'Laravel 7.12',
            'slug'=>Str::slug('Laravel 7.12')
        ]);
        Channle::create([
            'name'=>'Angular 9.2',
            'slug'=>Str::slug('Angular 9.2')
        ]);
        Channle::create([
            'name'=>'Vue js 3',
            'slug'=>Str::slug('Vue js 3')
        ]);
        Channle::create([
            'name'=>'Python 3.7',
            'slug'=>Str::slug('Python 3.7')
        ]);
        Channle::create([
            'name'=>'node.js 12.4',
            'slug'=>Str::slug('node.js 12.4')
        ]);
        
        
        
    }
}
