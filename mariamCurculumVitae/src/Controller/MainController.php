<?php

namespace App\Controller;

use App\Repository\MariamRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /* CECI EST UN COMMENTAIRE // une annotation prendra 2 étoiles aprèd le  premier slash et elle sera analysé par notre navigation */
    
    // CHANGEMENT DE L'URL DANS MA ROUTE (main par / et app_main par app_home)

    /**
     * @Route("/", name="app_home")
     */
   
    public function mariam(MariamRepository $mariamRepository): Response
    {
        return $this->render('main/index.html.twig', [

            'mariams' => /* je transmets ds la variable mariam ls élémts qui se trouvent ds $mariamRepository (ls élémts de la BDD) */$mariamRepository->findBy(
                array (), array ( 'id' => 'DESC' ) ),
            /* (, 'LIMIT 0,4')            
            Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 4 éléments */
            // 'controller_name' => 'MainController',
        ]);
    }




    // public function mariam(MariamRepository $mariamRepository): Response
    // {
    //     return $this->render('main/index.html.twig', [

    //         'mariam' => /* je transmets ds la variable mariam ls élémts qui se trouvent ds $mariamRepository (ls élémts de la BDD) */$mariamRepository->findBy(
    //             array (), array ( 'id' => 'DESC' ), 4 ),
    //         /* (, 'LIMIT 0,4')            
    //         Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 4 éléments */
    //         // 'controller_name' => 'MainController',
    //     ]);
    // }



    // public function loisirs(LoisirsRepository $loisirsRepository): Response
    // {
    //     return $this->render('main/index.html.twig', [

    //         'loisirs' => /* je transmets ds la variable loisirs ls élémts qui se trouvent ds $loisirsRepository (ls élémts de la BDD) */$loisirsRepository->findBy(
    //             array (), array ( 'id' => 'DESC' ), 4 ),
    //         /* (, 'LIMIT 0,4')            
    //         Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 4 éléments */
    //         // 'controller_name' => 'MainController',
    //     ]);
    // }


    // public function competences(CompetencesRepository $competencesRepository): Response
    // {
    //     return $this->render('main/index.html.twig', [

    //         'competences' => /* je transmets ds la variable competences ls élémts qui se trouvent ds $competencesRepository (ls élémts de la BDD) */$competencesRepository->findBy(
    //             array (), array ( 'id' => 'DESC' ), 4 ),
    //         /* (, 'LIMIT 0,4')            
    //         Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 4 éléments */
    //         // 'controller_name' => 'MainController',
    //     ]);
    // }


    // public function experiences(ExperiencesRepository $experiencesRepository): Response
    // {
    //     return $this->render('main/index.html.twig', [

    //         'experiences' => /* je transmets ds la variable experiences ls élémts qui se trouvent ds $experiencesRepository (ls élémts de la BDD) */$experiencesRepository->findBy(
    //             array (), array ( 'id' => 'DESC' ) ),
    //         /* (, 'LIMIT 0,4')            
    //         Grâce aux valeurs précisées après le limit, je précise d'abord que je veux commencer au premier élément du tableau, et je précise ensuite que je veux limiter à 4 éléments */
    //         // 'controller_name' => 'MainController',
    //     ]);
    // }
}
