<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Author;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        //Catégories       
        $str_categories = [
            'Chapitres',
        ];

        $obj_categories = array(count($str_categories));
        
        for ($i = 0; $i < count($str_categories); $i++) {
            $category = new Category();
            $category->setName($str_categories[$i]);
            $manager->persist($category);
            $obj_categories[$i] = $category;
        }
        //Articles
        for ($i = 0; $i < 6; $i++) {
            //Auteurs
            $auteur = new Author();
            $auteur->setName($faker->name());
            $manager->persist($auteur);

            //Articles
            $article = new Article();
            $article->setTitle($faker->sentence($nbWords = 10, $variableNbWords = true));
            $article->setSubTitle($faker->sentence($nbWords = 20, $variableNbWords = true));
            $article->setContent($faker->paragraph(6));
            $article->setCategory($obj_categories[$i % count($obj_categories)]);
            $article->setAuthor($auteur);
            $manager->persist($article);
        }

        // $manager->persist($product);
        $manager->flush();
    }
}

