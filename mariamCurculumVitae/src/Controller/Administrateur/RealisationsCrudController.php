<?php

namespace App\Controller\Administrateur;

use App\Entity\Realisations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RealisationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Realisations::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
