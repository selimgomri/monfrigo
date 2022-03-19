<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
#[ApiResource(
    collectionOperations: [ 'get' ],
    itemOperations: [ 'get' ]
)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('read:IngredientRecipe')]
    private $title;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'time')]
    private $prepTime;

    #[ORM\Column(type: 'string', length: 255)]
    private $picture;

    #[ORM\Column(type: 'integer')]
    private $guest;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: IngredientRecipe::class)]
    private $ingredientRecipes;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        $this->ingredientRecipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPrepTime(): ?\DateTimeInterface
    {
        return $this->prepTime;
    }

    public function setPrepTime(\DateTimeInterface $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getGuest(): ?int
    {
        return $this->guest;
    }

    public function setGuest(int $guest): self
    {
        $this->guest = $guest;

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
            $ingredientRecipe->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredientRecipe(IngredientRecipe $ingredientRecipe): self
    {
        if ($this->ingredientRecipes->removeElement($ingredientRecipe)) {
            // set the owning side to null (unless already changed)
            if ($ingredientRecipe->getRecipe() === $this) {
                $ingredientRecipe->setRecipe(null);
            }
        }

        return $this;
    }
}
