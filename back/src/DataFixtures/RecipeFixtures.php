<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture
{
    public const RECIPE_REFERENCE = "Recipe ";

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {  
            $recipe = new Recipe;  
            $recipe->setTitle('Title ' . $i);  
            $recipe->setContent('Content ' . $i);
            $recipe->setPrepTime(new DateTime());
            $recipe->setPicture('https://source.unsplash.com/random/50x50?recipe/' . $i);
            $recipe->setGuest(rand(1,10));
            $this->setReference(self::RECIPE_REFERENCE . $i, $recipe);
            $manager->persist($recipe);  
        } 

        $manager->flush();
    }
}
