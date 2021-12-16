<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {

        $cat = new Categorie();
        $cat->setNomCat("Jeux Video");
        $cat->setDescriptionCat("Liste de jeux video");
        $manager->persist($cat);

            $article1 = new Article();
            $article1->setNom("Zelda");
            $article1->setDescription("Jeu video sur switch");
            $article1->setPrix(25.99);
            $article1->setIsEnStock(true);
            $article1->setPaysOrigin("Japon");
            $article1->setCategorie($cat);
            $manager->persist($article1);

            $article2 = new Article();
            $article2->setNom("Minecraft");
            $article2->setDescription("Un jeu pour casser des cubes!");
            $article2->setPrix(20);
            $article2->setIsEnStock(true);
            $article2->setPaysOrigin("Suède");
            $article2->setCategorie($cat);
            $manager->persist($article2);

            $article3 = new Article();
            $article3->setNom("Assassin's Creed");
            $article3->setDescription("Un jeu pour tuer des gens");
            $article3->setPrix(45.99);
            $article3->setIsEnStock(true);
            $article3->setPaysOrigin("France");
            $article3->setCategorie($cat);
            $manager->persist($article3);

        $cat2 = new Categorie();
        $cat2->setNomCat("Développement information");
        $cat2->setDescriptionCat("Du développement information");
        $manager->persist($cat2);

            $article4 = new Article();
            $article4->setNom("Java");
            $article4->setDescription("Java c'est bien");
            $article4->setPrix(0);
            $article4->setIsEnStock(true);
            $article4->setPaysOrigin("");
            $article4->setCategorie($cat2);
            $manager->persist($article4);

            $article5 = new Article();
            $article5->setNom("Python");
            $article5->setDescription("Python c'est bien");
            $article5->setPrix(0);
            $article5->setIsEnStock(true);
            $article5->setPaysOrigin("");
            $article5->setCategorie($cat2);
            $manager->persist($article5);

            $article6 = new Article();
            $article6->setNom("Windev");
            $article6->setDescription("Windev c'est nul");
            $article6->setPrix(0);
            $article6->setIsEnStock(true);
            $article6->setPaysOrigin("");
            $article6->setCategorie($cat2);
            $manager->persist($article6);

        $cat3 = new Categorie();
        $cat3->setNomCat("Nouriture");
        $cat3->setDescriptionCat("Liste de plusieur article de nouriture");
        $manager->persist($cat3);

            $article7 = new Article();
            $article7->setNom("Pomme");
            $article7->setDescription("Tes pomme la !");
            $article7->setPrix(5.2);
            $article7->setIsEnStock(true);
            $article7->setPaysOrigin("France");
            $article7->setCategorie($cat3);
            $manager->persist($article7);

            $article8 = new Article();
            $article8->setNom("Kiwi");
            $article8->setDescription("kiwi c'est le fruit du wiki");
            $article8->setPrix(3.5);
            $article8->setIsEnStock(true);
            $article8->setPaysOrigin("France");
            $article8->setCategorie($cat3);
            $manager->persist($article8);

            $article9 = new Article();
            $article9->setNom("Clementine");
            $article9->setDescription("C'est petit mais c'est bon");
            $article9->setPrix(2.3);
            $article9->setIsEnStock(false);
            $article9->setPaysOrigin("France");
            $article9->setCategorie($cat3);
            $manager->persist($article9);

        $cat4 = new Categorie();
        $cat4->setNomCat("Theme Wordpress");
        $cat4->setDescriptionCat("Des thèmes wordpress magnifique a achetter!");
        $manager->persist($cat4);

            $article10 = new Article();
            $article10->setNom("Kiwi");
            $article10->setDescription("Le thème kiwi");
            $article10->setPrix(10);
            $article10->setIsEnStock(true);
            $article10->setPaysOrigin("France");
            $article10->setCategorie($cat4);
            $manager->persist($article10);

            $article11 = new Article();
            $article11->setNom("Pomme");
            $article11->setDescription("Le thème pomme");
            $article11->setPrix(10);
            $article11->setIsEnStock(true);
            $article11->setPaysOrigin("France");
            $article11->setCategorie($cat4);
            $manager->persist($article11);

            $article12 = new Article();
            $article12->setNom("Citron");
            $article12->setDescription("Le thème citron");
            $article12->setPrix(15);
            $article12->setIsEnStock(true);
            $article12->setPaysOrigin("France");
            $article12->setCategorie($cat4);
            $manager->persist($article12);


        $manager->flush();
    }
}
