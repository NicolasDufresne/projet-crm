<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use App\Entity\Invoice;
use App\Entity\Ticket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('status')
            ->add('TVA')
            ->add('TTC')
            ->add('HT')
            ->add('client_id', EntityType::class, array(
                'class' => Client::class,
                'label' => 'Client'
            ))
            ->add('ticket_id', EntityType::class, array(
                'class' => Ticket::class,
                'label' => 'Ticket'
            ))
//            ->add('ticket_id')
//            ->add('client_id')
//            ->add('compagny_id')
//            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
