<?php

namespace App\DataFixtures;

use App\DataFixtures\IngredientFixtures;
use App\DataFixtures\RecipeFixtures;
use App\Entity\IngredientRecipe as EntityIngredientRecipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientRecipe extends Fixture implements  DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {  
            $ingredientRecipe = new EntityIngredientRecipe;  
            $ingredientRecipe->setQuantity(rand(1, 10));  
            $ingredientRecipe->setRecipe($this->getReference(RecipeFixtures::RECIPE_REFERENCE . $i));
            $ingredientRecipe->setIngredient($this->getReference(IngredientFixtures::INGREDIENT_REFERENCE . $i));
            $manager->persist($ingredientRecipe);  
        }  
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            RecipeFixtures::class,
            IngredientFixtures::class,
        );
    }
}