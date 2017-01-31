<?php

namespace oc\plateformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ocplateformBundle:Default:index.html.twig');
    }
}
