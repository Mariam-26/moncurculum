<?php

namespace App\Controller\Administrateur;

use App\Entity\Mariam;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MariamCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mariam::class;
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
