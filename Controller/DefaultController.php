<?php

namespace BD\Bundle\EzIFTTTDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BDEzIFTTTDemoBundle:Default:index.html.twig', array('name' => $name));
    }
}
