<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // TODO: Redirection if user is already logged
        // return $this->redirectToRoute('homepage');

        $currentYear = (integer)date("Y");

        $builder->add('email');
        $builder->add('username');
        $builder->add('plainPassword', NULL);
        $builder->add('email');
        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('location');
        $builder->add('dateOfBirth',
         DateType::class,
         array(
            'widget' => 'single_text',
            'years' => range($currentYear, $currentYear - 100),
            'label' => 'Date de naissance'
            )
        );
      //  $builder->add('genderId');
        $builder->add('deviseId');

        
        // default values
        $builder->add('isHost', HiddenType::class, array(
          'required' => true,
          'data' => 0,
        ));
        $builder->add('paypalAccount', HiddenType::class, array(
          'required' => true,
          'data' => 'moneyIsSoFunny',
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
