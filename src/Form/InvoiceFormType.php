<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Compagny;
use App\Entity\Invoice;
use App\Entity\Ticket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref', TextType::class, [
                'attr' => ['placeholder' => 'Référence'],
            ])
            ->add('status', TextType::class, [
                'attr' => ['placeholder' => 'Statut'],
            ])
            ->add('TVA', TextType::class, [
                'attr' => ['placeholder' => 'TVA'],
            ])
            ->add('TTC', TextType::class, [
                'attr' => ['placeholder' => 'TTC'],
            ])
            ->add('HT', TextType::class, [
                'attr' => ['placeholder' => 'HT'],
            ])
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
