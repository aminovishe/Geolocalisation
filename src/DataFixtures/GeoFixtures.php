<?php

namespace App\DataFixtures;

use App\Entity\Localisation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Query\Expr\Math;

class GeoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = ['restaurant','hopital','hotel','cafe','ville'];

        function rand_float($st_num=0,$end_num=1,$mul=1000000)
        {
            if ($st_num>$end_num) return false;
            return mt_rand($st_num*$mul,$end_num*$mul)/$mul;
        }

        for ($i = 1; $i<=10000; $i++){
            $localisation = new Localisation();
            $localisation->setLocationName("Location $i")
                        ->setLocationCategory($category[round(rand(0,4))])
                        ->setLocationLat(rand_float(30,38))
                        ->setLocationLon(rand_float(7.6,11.5));
            $manager->persist($localisation);
        }

        $manager->flush();
    }
}
