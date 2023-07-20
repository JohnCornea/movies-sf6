<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Iron Man');
        $movie->setReleaseYear(2008);
        $movie->setDescription('Best Marvel movie!');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2015/04/08/01/49/superhero-712060_640.jpg');
        // Add Data To Pivot Table
        $movie->addActor ($this->getReference('actor_1'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Thor 3');
        $movie2->setReleaseYear(2017);
        $movie2->setDescription('Thor Ragnarok!');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2017/07/19/17/26/gabriel-2519793_640.jpg');
        // Add Data To Pivot Table
        $movie->addActor($this->getReference('actor_3'));
        $manager->persist($movie2  );

        $manager->flush();
    }
}