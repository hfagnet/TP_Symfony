<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Faker\Factory;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 120; $i++)
        {
            $article = new Article();

            $sentence = $faker->sentence(4);
            $title = substr($sentence, 0, strlen($sentence) - 1);
            $article->setTitle($title)
                    ->setAuthor($faker->name())
                    ->setContent($faker->text(3000))
                    ->setDatetime($faker->dateTimeThisYear());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
