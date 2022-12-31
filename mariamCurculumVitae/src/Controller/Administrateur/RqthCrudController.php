<?php

namespace App\Controller\Administrateur;

use App\Entity\Rqth;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RqthCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rqth::class;
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
