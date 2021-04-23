<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use App\Entity\Exchange;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExchangeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'attr' => ['placeholder' => 'Type de l\'échange'],
            ])
            ->add('detail', TextType::class, [
                'attr' => ['placeholder' => 'Détails de l\'échange'],
            ])
            ->add('client_id', EntityType::class, array(
                'class' => Client::class,
                'label' => 'Client'
            ))
//            ->add('client_id')
//            ->add('compagny_id')
//            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exchange::class,
        ]);
    }
}
