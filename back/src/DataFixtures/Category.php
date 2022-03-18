<?php

namespace App\DataFixtures;

use App\Entity\Category as EntityCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Category extends Fixture
{
    public const CATEGORY_REFERENCE = "Category";
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 50; $i++) {  
            $category = new EntityCategory();  
            $category->setName('Catégorie ' . $i);
            $this->setReference(self::CATEGORY_REFERENCE, $category);
            $manager->persist($category);  
        }

        $manager->flush();
    }
}
