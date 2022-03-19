<?php

namespace App\DataFixtures; 

use App\DataFixtures\CategoryFixtures;
use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public const INGREDIENT_REFERENCE = "Ingredient ";
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {  
            $ingredient = new Ingredient;  
            $ingredient->setName('Ingredient ' . $i);  
            $ingredient->setCategory($this->getReference(CategoryFixtures::CATEGORY_REFERENCE . $i));
            $this->setReference(self::INGREDIENT_REFERENCE . $i, $ingredient);
            $ingredient->setUnit('Unit ' . $i);
            $ingredient->setPicture('Picture ' . $i);

            $manager->persist($ingredient);  
        }  
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
        );
    }
}
