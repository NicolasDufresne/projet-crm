<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentFormType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('object', TextType::class, [
                'attr' => ['placeholder' => 'Objet du rendez-vous'],
            ])
            ->add('dateTime')
//            ->add('ticket_id')
//            ->add('compagny_id')
            ->add('client_id', EntityType::class, array(
                'class' => Client::class,
                'label' => 'Client'
            ))
//            ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
