<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('name')
            ->add('first_name')
            ->add('phonenumber')
            ->add('adress')
            ->add('CP')
            ->add('city')
            ->add('commitment')
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
