<?php

namespace App\DataFixtures;

use App\DataFixtures\Category as DataFixturesCategory;
use App\Entity\Ingredient as EntityIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Ingredient extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {  
            $ingredient = new EntityIngredient;  
            $ingredient->setName('Ingredient ' . $i);  
            $ingredient->setCaterory(($this->getReference(DataFixturesCategory::CATEGORY_REFERENCE)));
            $ingredient->setUnit('Unit ' . $i);
            $ingredient->setPicture('Picture ' . $i);
            $manager->persist($ingredient);  
        }  
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            DataFixturesCategory::class,
        );
    }
}
