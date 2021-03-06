<?php

namespace App\Form;

use App\Entity\Chambres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NumeroChambre')
            ->add('TypeChambre')
            ->add('capaciteChambre')
            ->add('IdHotel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambres::class,
        ]);
    }
}
