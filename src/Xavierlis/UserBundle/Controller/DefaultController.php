<?php

namespace Xavierlis\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('XavierlisUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
