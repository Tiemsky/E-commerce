<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            array('id'=>1, 'category_name'=>'Animalerie', 'category_slug' => Str::slug('Animalerie')),
            array('id'=>2, 'category_name'=>'Appareils', 'category_slug' => Str::slug('Appareils')),
            array('id'=>3, 'category_name'=>'Applis & Jeux', 'category_slug' => Str::slug('Applis & Jeux')),
            array('id'=>4, 'category_name'=>'Auto et Moto', 'category_slug' => Str::slug('Auto et Moto')),
            array('id'=>5, 'category_name'=>'Bagages et accessoires de voyage', 'category_slug' => Str::slug('Bagages et accessoires de voyage')),
            array('id'=>6, 'category_name'=>'Beauté et Parfum', 'category_slug' => Str::slug('Beauté et Parfum')),
            array('id'=>7, 'category_name'=>'Beauté Premium', 'category_slug' => Str::slug('Beauté Premium')),
            array('id'=>8, 'category_name'=>'Boutique chèques-cadeaux', 'category_slug' => Str::slug('Boutique chèques-cadeaux')),
            array('id'=>9, 'category_name'=>'Boutique Kindle', 'category_slug' => Str::slug('Boutique Kindle')),
            array('id'=>10, 'category_name'=>'Bricolage', 'category_slug' => Str::slug('Bricolage')),
            array('id'=>11, 'category_name'=>'Bébés & Puériculture', 'category_slug' => Str::slug('Bébés & Puériculture')),
            array('id'=>12, 'category_name'=>'Cuisine & Maison', 'category_slug' => Str::slug('Cuisine & Maison')),
            array('id'=>13, 'category_name'=>'DVD & Blu-ray', 'category_slug' => Str::slug('DVD & Blu-ray')),
            array('id'=>14, 'category_name'=>'Epicerie', 'category_slug' => Str::slug('Epicerie')),
            array('id'=>15, 'category_name'=>'Fournitures de bureau', 'category_slug' => Str::slug('Fournitures de bureau')),
            array('id'=>16, 'category_name'=>'Gros électroménager', 'category_slug' => Str::slug('Gros électroménager')),
            array('id'=>17, 'category_name'=>'Handmade', 'category_slug' => Str::slug('Handmade')),
            array('id'=>18, 'category_name'=>'High-Tech', 'category_slug' => Str::slug('High-Tech')),
            array('id'=>19, 'category_name'=>'Hygiène et Santé', 'category_slug' => Str::slug('Hygiène et Santé')),
            array('id'=>20, 'category_name'=>'Informatique', 'category_slug' => Str::slug('Informatique')),
            array('id'=>21, 'category_name'=>'Instruments de musique & Sono', 'category_slug' => Str::slug('Instruments de musique & Sono')),
            array('id'=>22, 'category_name'=>'Jardin', 'category_slug' => Str::slug('Jardin')),
            array('id'=>23, 'category_name'=>'Jeux et Jouets', 'category_slug' => Str::slug('Jeux et Jouets')),
            array('id'=>24, 'category_name'=>'Jeux vidéo', 'category_slug' => Str::slug('Jeux vidéo')),
            array('id'=>25, 'category_name'=>'Livres', 'category_slug' => Str::slug('Livres')),
            array('id'=>26, 'category_name'=>'Livres audio Audible', 'category_slug' => Str::slug('Livres audio Audible')),
            array('id'=>27, 'category_name'=>'Logiciels', 'category_slug' => Str::slug('Logiciels')),
            array('id'=>28, 'category_name'=>'Luminaires et Eclairage', 'category_slug' => Str::slug('Luminaires et Eclairage')),
            array('id'=>29, 'category_name'=>'Luxury Stores', 'category_slug' => Str::slug('Luxury Stores')),
            array('id'=>30, 'category_name'=>'Mode', 'category_slug' => Str::slug('Mode')),
            array('id'=>31, 'category_name'=>'Moins de 10€', 'category_slug' => Str::slug('Moins de 10€')),
            array('id'=>32, 'category_name'=>'Musique : CD & Vinyles', 'category_slug' => Str::slug('Musique : CD & Vinyles')),
            array('id'=>33, 'category_name'=>'Musique classique', 'category_slug' => Str::slug('Musique classique')),
            array('id'=>34, 'category_name'=>'Secteur industriel et scientifique', 'category_slug' => Str::slug('Secteur industriel et scientifique')),
            array('id'=>35, 'category_name'=>'Sports et Loisirs', 'category_slug' => Str::slug('Sports et Loisirs')),
            array('id'=>36, 'category_name'=>'Téléchargement de musique', 'category_slug' => Str::slug('Téléchargement de musique'))
        ];
        DB::table('categories')->insert($categories);
    }
}
