<?php

namespace Xavierlis\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('XavierlisCoreBundle:Default:index.html.twig');
    }
}
