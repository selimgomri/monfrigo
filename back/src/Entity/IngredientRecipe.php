<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IngredientRecipeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IngredientRecipeRepository::class)]
#[ApiResource(
    collectionOperations: [ 'get' ],
    itemOperations: [ 'get' ],
    normalizationContext: [
        'groups' => [ 'read:IngredientRecipe' ]
    ]
)]
class IngredientRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('read:IngredientRecipe')]
    private $id;

    #[ORM\Column(type: 'float')]
    #[Groups('read:IngredientRecipe')]
    private $quantity;

    #[ORM\ManyToOne(targetEntity: Ingredient::class, inversedBy: 'ingredientRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:IngredientRecipe', 'read:Recipe'])]
    private $ingredient;

    #[ORM\ManyToOne(targetEntity: Recipe::class, inversedBy: 'ingredientRecipes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('read:IngredientRecipe')]
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }
}
