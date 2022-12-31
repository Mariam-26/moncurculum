<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/* CECI EST UN COMMENTAIRE // une annotation prendra 2 étoiles aprèd le  premier slash et elle sera analysé par notre navigation */

// MON ACCES A MON ADMIN DASHBOARD

/**
* @Route("/admin", name="admin_")
* @package App\Controller\Admin
*/
class AdminController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
