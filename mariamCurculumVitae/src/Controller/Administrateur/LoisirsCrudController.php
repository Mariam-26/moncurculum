<?php

namespace App\Controller\Administrateur;

use App\Entity\Loisirs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LoisirsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Loisirs::class;
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
