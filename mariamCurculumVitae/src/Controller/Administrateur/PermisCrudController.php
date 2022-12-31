<?php

namespace App\Controller\Administrateur;

use App\Entity\Permis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PermisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Permis::class;
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
