<?php

namespace App\Form;

use App\Entity\Mariam;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MariamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('titre')
            ->add('accroche')
            ->add('ecole')
            ->add('entreprise')
            ->add('email')
            ->add('mobile')
            ->add('image')
            ->add('ville')
            ->add('code_postal')
            ->add('pays')
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mariam::class,
        ]);
    }
}
