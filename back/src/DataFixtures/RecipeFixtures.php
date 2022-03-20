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
            $recipe->setContent('Content ' . $i . ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem pariatur deleniti, obcaecati dignissimos sequi quos, accusamus placeat excepturi repudiandae aperiam earum quibusdam, quam neque at consectetur libero modi praesentium odit.
            Nemo commodi natus fuga voluptatibus, quis quisquam mollitia quas optio nobis ullam repellat unde officia qui aperiam eligendi similique! Quidem fugiat delectus, dignissimos inventore aspernatur temporibus! Impedit veritatis cumque cum!
            Fugiat, illum. Dolore officiis placeat modi illum ab distinctio, itaque magnam reprehenderit nam consequatur quam numquam doloremque aliquid impedit dolor quos vitae voluptatem ipsum est molestiae. Qui ab eos autem.
            Cupiditate asperiores illo tenetur recusandae qui fuga. Iste numquam enim quo cum, rerum ut amet labore at libero laboriosam dolorem ducimus maxime dolorum illo incidunt ea, modi saepe aliquam natus.
            Enim ut similique dignissimos, sunt, illum quibusdam suscipit consequuntur quo inventore, adipisci soluta atque excepturi aspernatur ducimus dolorum hic voluptas ipsa cupiditate veritatis porro commodi! Ex, libero. Ab, iste dolorem.
            Quisquam laudantium illo harum aliquam perspiciatis inventore facilis libero omnis quod, deserunt reprehenderit tempora culpa commodi dolorem? Necessitatibus molestias, sequi nihil iste, deserunt eum nobis quaerat neque voluptatibus commodi aliquid?
            Commodi quisquam nemo eum excepturi, veritatis dolores necessitatibus fuga architecto enim velit, cupiditate quas nesciunt officiis dolor eos. Cum in at quo ab debitis inventore eos architecto harum distinctio doloremque.
            Quibusdam tempore aperiam soluta vel porro, quae unde nobis expedita? Nam deleniti earum officia laborum aperiam incidunt harum tempora ducimus eius alias libero rerum iste, reprehenderit natus accusantium. Maiores, tempore.
            Repudiandae aliquid veritatis reiciendis. Magnam tempora voluptatum beatae maiores nostrum dolore facere aliquam nesciunt illo quasi, quam eligendi mollitia sint quae sequi! Dolores reiciendis officia aspernatur beatae vero ipsum quaerat?
            Cupiditate repellendus nostrum enim unde similique. Et officia ullam, eum nisi sint cupiditate deleniti mollitia fugit sunt inventore commodi? Voluptatum nulla ducimus assumenda ad corporis quae est perspiciatis dolor fugit.
            ');
            $recipe->setPrepTime(new DateTime());
            $recipe->setPicture('https://source.unsplash.com/random/' . $i . '?recipe?food/');
            $recipe->setGuest(rand(1,10));
            $this->setReference(self::RECIPE_REFERENCE . $i, $recipe);
            $manager->persist($recipe);  
        } 

        $manager->flush();
    }
}
