<?php

namespace PayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        return $this->render('PayBundle:Default:index.html.twig');
    }
}
