<?php

namespace Adoptez\AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdoptezAnimalsBundle:Default:index.html.twig');
    }
}
