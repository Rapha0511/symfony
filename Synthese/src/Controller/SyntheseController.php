<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SyntheseController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('synthese/home.html.twig'
    );
    }

    /**
     * @Route("/syntheses", name="syntheses")
     */
    public function index()
    {
        return $this->render('synthese/index.html.twig'
    );
    }



        /**
     * @Route("/synthese/2", name="synthese_show")
     */
    public function show()
    {
        return $this->render('synthese/show.html.twig'
    );
    }
}


