<?php

namespace App\Controller\Administrateur;

use App\Entity\Formations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FormationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formations::class;
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
