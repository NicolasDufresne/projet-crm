<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['placeholder' => 'E-mail'],
            ])
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Nom'],
            ])
            ->add('first_name', TextType::class, [
                'attr' => ['placeholder' => 'Prénom'],
            ])
            ->add('phonenumber', TextType::class, [
                'attr' => ['placeholder' => 'Téléphone'],
            ])
            ->add('adress', TextType::class, [
                'attr' => ['placeholder' => 'Adresse'],
            ])
            ->add('CP', TextType::class, [
                'attr' => ['placeholder' => 'Code Postal'],
            ])
            ->add('city', TextType::class, [
                'attr' => ['placeholder' => 'Ville'],
            ])
            ->add('commitment', TextType::class, [
                'attr' => ['placeholder' => 'Engagement'],
            ])
            ->add('compagny', EntityType::class, array(
                'class' => Compagny::class,
                'label' => 'Compagny'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
