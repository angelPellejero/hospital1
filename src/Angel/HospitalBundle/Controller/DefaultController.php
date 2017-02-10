<?php

namespace Angel\HospitalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="hospital")
     */
    public function indexAction()
    {
        return $this->render('AngelHospitalBundle:Default:index.html.twig');
    }
}
