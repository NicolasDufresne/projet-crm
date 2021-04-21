<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use App\Entity\Exchange;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExchangeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('detail')
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
