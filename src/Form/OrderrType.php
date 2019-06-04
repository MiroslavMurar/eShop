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

//            ->add('country', EntityType::class, [
//                'class' =>Country::class,
//                'choice_label'=> 'name',
//                'multiple' => true,
//                'expanded' => true ])

//            ->add('payment', EntityType::class, ['class' =>Payment::class,
//                'choice_label'=> 'name',
//                'multiple' => true,
//                'expanded' => true ])
//
//            ->add('transport', EntityType::class, ['class' =>Transport::class,
//                'choice_label'=> 'name',
//                'multiple' => true,
//                'expanded' => true ])
//


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orderr::class,
        ]);
    }
}
