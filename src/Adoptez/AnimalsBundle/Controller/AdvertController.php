<?php

// src/Adoptez/AnimalsBundle/Controller/AdvertController.php

namespace Adoptez\AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('AdoptezAnimalsBundle:Advert:index.html.twig', array(
            'nom' => 'veyrat',
            'prenom' => 'fabien'
        ));
        return new Response($content);
    }

    public function viewAction($id)
    {
        return new Response("Affichage de l'annonce d'id : ".$id);
    }

    public function listingAction($place, $animal, $page)
    {
        $content = $this->get('templating')
                        ->render('AdoptezAnimalsBundle:Advert:listing.html.twig', array(
                            'place' => $place,
                            'animal' => $animal,
                            'page' => $page
                        )
                        );
            return new Response($content);
    }
}