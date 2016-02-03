<?php

// src/Adoptez/AnimalsBundle/Controller/AdvertController.php

namespace Adoptez\AnimalsBundle\Controller;

use Adoptez\AnimalsBundle\Entity\Advert;
use Adoptez\AnimalsBundle\Entity\Pictures;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function addAction(Request $request){
        $advert = new Advert();
        $advert->setName('Gaya');
        $advert->setDescription("Magnifique Border Collie servant d'exemple");
        $advert->setPublished("1");

        $picture = new Pictures();
        $picture->setUrl("file:///C:/Users/Fabien/Desktop/11415371_10206658863612348_5293491148816802510_n.jpg");
        $picture->setAlt("Gaya Border Collie");
        $picture->setPosition(1);

        // On récupère et persiste l'entité
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->persist($picture);

        $em->flush();

        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
            return $this->redirect($this->generateUrl('adoptez_animals_view', array('id' => $advert->getId())));
        }

        return $this->render('AdoptezAnimalsBundle:Advert:add.html.twig');
    }

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AdoptezAnimalsBundle:Advert')
        ;

        $advert = $repository->find($id);

        if (null === $advert) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $listPictures = $this->getDoctrine()
            ->getManager()
            ->getRepository('AdoptezAnimalsBundle:Pictures')
            ->findBy(array('advert' => $advert));

        return $this->render('AdoptezAnimalsBundle:Advert:view.html.twig', array(
            'advert' => $advert,
            'listPictures' => $listPictures
        ));
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