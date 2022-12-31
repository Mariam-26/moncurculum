<?php

namespace App\Controller\Administrateur;

use App\Entity\Reseaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReseauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reseaux::class;
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
