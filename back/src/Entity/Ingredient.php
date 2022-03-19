<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ApiResource(
    collectionOperations: [ 'get' ],
    itemOperations: [ 'get' ],
    normalizationContext: [
        'groups' => [ 'read:Ingredient' ]
    ]
)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('read:Ingredient')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups([ 'read:Ingredient', 'read:IngredientRecipe' ])]
    private $name;

    #[ORM\Column(type: 'string', length: 45, nullable: true)]
    #[Groups('read:Ingredient')]
    private $unit;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups('read:Ingredient')]
    private $picture;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('read:Ingredient')]
    private $category;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: IngredientRecipe::class)]
    private $ingredientRecipes;

    public function __construct()
    {
        $this->ingredientRecipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, IngredientRecipe>
     */
    public function getIngredientRecipes(): Collection
    {
        return $this->ingredientRecipes;
    }

    public function addIngredientRecipe(IngredientRecipe $ingredientRecipe): self
    {
        if (!$this->ingredientRecipes->contains($ingredientRecipe)) {
            $this->ingredientRecipes[] = $ingredientRecipe;
            $ingredientRecipe->setIngredient($this);
        }

        return $this;
    }

    public function removeIngredientRecipe(IngredientRecipe $ingredientRecipe): self
    {
        if ($this->ingredientRecipes->removeElement($ingredientRecipe)) {
            // set the owning side to null (unless already changed)
            if ($ingredientRecipe->getIngredient() === $this) {
                $ingredientRecipe->setIngredient(null);
            }
        }

        return $this;
    }
}
