<?php

namespace App\Controller\Administrateur;

use App\Entity\Rqth;
use App\Entity\User;
use App\Entity\Poste;
use App\Entity\Mariam;
use App\Entity\Permis;
use App\Entity\Langues;
use App\Entity\Loisirs;
use App\Entity\Reseaux;
use App\Entity\Formations;
use App\Entity\Competences;
use App\Entity\Experiences;
use App\Entity\Utilisateur;
use App\Entity\Realisations;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MariamCurculumVitae');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Mariam', 'fas fa-list', Mariam::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', Utilisateur::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Poste', 'fas fa-list', Poste::class);
        yield MenuItem::linkToCrud('Competences', 'fas fa-list', Competences::class);
        yield MenuItem::linkToCrud('Experiences', 'fas fa-list', Experiences::class);
        yield MenuItem::linkToCrud('Formations', 'fas fa-list', Formations::class);
        yield MenuItem::linkToCrud('Realisations', 'fas fa-list', Realisations::class);
        yield MenuItem::linkToCrud('Permis', 'fas fa-list', Permis::class);
        yield MenuItem::linkToCrud('Langues', 'fas fa-list', Langues::class);
        yield MenuItem::linkToCrud('Rqth', 'fas fa-list', Rqth::class);
        yield MenuItem::linkToCrud('Reseaux', 'fas fa-list', Reseaux::class);
        yield MenuItem::linkToCrud('Loisirs', 'fas fa-list', Loisirs::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
