<?php

namespace App\Controller\Admin;

use App\Entity\IngredientRecipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IngredientRecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IngredientRecipe::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
