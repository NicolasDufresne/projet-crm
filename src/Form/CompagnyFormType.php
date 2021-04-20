<?php

namespace App\Form;

use App\Entity\Compagny;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompagnyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('adress')
            ->add('send_adress')
            ->add('TVA')
            ->add('NAF')
            ->add('SIRET')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compagny::class,
        ]);
    }
}
