<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Ticket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('object')
            ->add('details')
            ->add('details')
            ->add('details')
            ->add('client', EntityType::class, array(
                'class' => Client::class,
                'label' => 'Client'
            ))
//            ->add('Exchange_id')
//            ->add('quotation_id')
//            ->add('category_id')
//            ->add('historic_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
