<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // je crée mon sélecteur de genres
        $genres =['Roman', 'BD', 'Album', 'Documentaire'];
        // je crée un tableau pour enregistrer chaque objet de type genre
        $tabObjetsGenre = [];
        // je fais une boucle pour créer autant d'objets que de genres dans la liste
        foreach($genres as $gen) {
            $genre = new Genre();
            $genre->setName($gen);
            $manager->persist($genre);
            array_push($tabObjetsGenre, $genre);
        }
     
      
        $manager->flush();
           
    }
   
}
