<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompagnyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Nom de l\'entreprise'],
            ])
            ->add('adress', TextType::class, [
                'attr' => ['placeholder' => 'Adresse complète'],
            ])
            ->add('send_adress', TextType::class, [
                'attr' => ['placeholder' => 'Adresse d\'envoi'],
            ])
            ->add('TVA', TextType::class, [
                'attr' => ['placeholder' => 'TVA'],
            ])
            ->add('NAF', TextType::class, [
                'attr' => ['placeholder' => 'NAF'],
            ])
            ->add('SIRET', TextType::class, [
                'attr' => ['placeholder' => 'SIRET'],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compagny::class,
        ]);
    }
}
