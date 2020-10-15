<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Syntheses; // acces au model de la bdd
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface; // insere et modifie la bdd
class SyntheseController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('synthese/home.html.twig'  // appel un template 
    );
    }

    /**
     * @Route("/syntheses", name="syntheses")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Syntheses::class); // on recup la bdd
        $syntheses = $repo->findAll(); // on execute une requete select *

        return $this->render('synthese/index.html.twig',[
            'syntheses'=>$syntheses // on stock les donnée de la requetes dans une variable syntheses
        ]
    );
    }


    /**
     * @Route("/synthese/new", name="synthese_create")
     * @Route("/synthese/{id}/edit",name="synthese_edit")
     */
    public function form(Syntheses $synthese = null,Request $request,EntityManagerInterface $entityManager)
    {
        if(!$synthese){
            $synthese = new Syntheses();
        }


        $form = $this->createformBuilder($synthese)
                ->add("title")
                ->add('contenu')
                ->add('descriptif')
                ->getForm();

                $form->handleRequest($request); // gere le contenu de la requette

                if($form->isSubmitted() && $form->isValid()){ // si mon formulaire est submit et n'est pas vide
                    if(!$synthese->getId()){
                        $synthese->SetCreation(new \Datetime());

                    }
                    $entityManager->persist($synthese); // prepare toi a mettre les info dans la db
                    $entityManager->flush(); // insere dans la bdd
                }
            dump($request);
        return $this->render('synthese/create.html.twig',[
            'formSynthese'=>$form -> createView()
        ]
    );
    }



        /**
     * @Route("/synthese/{id}", name="synthese_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Syntheses::class); // on recup la bdd
        $synthese = $repo->find($id); // on execute une requete select one


        return $this->render('synthese/show.html.twig',[
            'synthese'=>$synthese
        ]
    );
    }

}


