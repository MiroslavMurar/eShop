<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Orderr;
use App\Entity\Payment;
use App\Entity\Transport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderrType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name',
//                'multiple' => true,
//                'expanded' => true,
            ])

//
//
//            ->add('country', EntityType::class, array(
//                'class' => Country::class,
////                'multiple' => true,
//                'expanded' => true,
//            ))
//
//            ->add('country', EntityType::class, [
//                'class' => Country::class,
//                'choice_label' => 'name'
//            ])

//
//
            ->add('payment', EntityType::class, array(
                'class' => Payment::class,
                'choice_label' => 'name',
//                'multiple' => true,
//                'expanded' => true,
                'choice_attr' => function (Payment $payment) {return ['data-payment' => $payment ->getPrice()];}

            ))


            ->add('transport', EntityType::class, array(
                'class' => Transport::class,
                'choice_label' => 'name',
//                'multiple' => true,
//                'expanded' => true,
            'choice_attr' => function (Transport $transport) {return ['data-transport' => $transport->getPrice()];}

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orderr::class,
        ]);
    }
}
