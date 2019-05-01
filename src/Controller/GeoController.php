<?php

namespace App\Controller;

use App\Repository\LocalisationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeoController extends AbstractController
{

    /**
     * @Route("/", name="geo")
     */
    public function index(LocalisationRepository $repo, Request $request)
    {
        if ($request->request->count() > 0) {
            $locationSearch = $repo->findBy(array('locationCategory' => $request->request->get('category')));
            $currentLat = $request->request->get('currentLat');
            $currentLon = $request->request->get('currentLon');
            $radius = $request->request->get('radius');
            $unit = $request->request->get('unit');

            function distance($lat1, $lng1, $lat2, $lng2, $unit = 'km')
            {
                $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
                $rlo1 = deg2rad($lng1);
                $rla1 = deg2rad($lat1);
                $rlo2 = deg2rad($lng2);
                $rla2 = deg2rad($lat2);
                $dlo = ($rlo2 - $rlo1) / 2;
                $dla = ($rla2 - $rla1) / 2;
                $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
                $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
                $meter = ($earth_radius * $d);
                if ($unit == 'km') {
                    return $meter / 1000;
                }
                return $meter;
            }


            $result = [];
            foreach ($locationSearch as $value) {

                $dist = distance($currentLat, $currentLon, $value->getLocationLat(), $value->getLocationLon(), $unit);
                if ($dist <= $radius) {
                    array_push($result, $value);
                }
            }

            return $this->render('geo/index.html.twig', [
                'controller_name' => 'GeoController',
                'localisations' => $result
            ]);
        } else {
            $localisations = $repo->findAll();
            return $this->render('geo/index.html.twig', [
                'controller_name' => 'GeoController',
                'localisations' => $localisations
            ]);
        }

    }

    /**
     * @Route("/geo/search/{category}/{longitude}/{latitude}", name="search")
     */
    public function search(LocalisationRepository $repo, $category, $longitude, $latitude)
    {

    }

}
