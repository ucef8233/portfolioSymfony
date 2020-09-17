<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ProjectsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 5; $i++) {
            $projet = new Projects();
            $projet->setNom('projet ' . $i)
                ->setLien('lien ' . $i)
                ->setDescription('descrioption ' . $i)
                ->setImage('http://placehold.it/350x150');
            $manager->persist($projet);
        }

        $manager->flush();
    }
}
