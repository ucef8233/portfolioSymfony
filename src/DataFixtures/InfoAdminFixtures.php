<?php

namespace App\DataFixtures;

use App\Entity\{InfoAdmin, Langage, Etude, Experiance, Softskill};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InfoAdminFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 2; $i++) {
            $admin = new InfoAdmin();
            $admin->setNom('Youssef Salim')
                ->setTitre('Developper Web!')
                ->setMail('ucefsalim@gmail.com')
                ->setAdress('Block 50 n16 hay hassani casablanca');

            $manager->persist($admin);
            //     for ($j = 1; $j < 5; $j++) {
            //         $langage = new Langage();
            //         $langage
            //             ->setLangage('langage' . $j)
            //             ->setAdmin($admin);
            //         $manager->persist($langage);
            //     }

            //     for ($k = 1; $k < 3; $k++) {
            //         $etude = new Etude();
            //         $etude
            //             ->setDate('du 1/20/2012 au 15/30/2020')
            //             ->setDescription('bla bla bla bla ')
            //             ->setAdmin($admin);
            //         $manager->persist($etude);
            //     }

            //     for ($a = 1; $a < 3; $a++) {
            //         $experiance = new Experiance();
            //         $experiance
            //             ->setDate('du 1/20/2012 au 15/30/2020')
            //             ->setExperiance('bla bla bla bla ')
            //             ->setAdmin($admin);
            //         $manager->persist($experiance);
            //     }
            //     for ($b = 1; $b < 5; $b++) {
            //         $softskill = new Softskill();
            //         $softskill
            //             ->setSoftskill('softskill' . $b)
            //             ->setAdmin($admin);
            //         $manager->persist($softskill);
            //     }
        }
        $manager->flush();
    }
}
