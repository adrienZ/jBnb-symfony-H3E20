<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentYear = (integer)date("Y");

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
        $builder->add('genderId');
        $builder->add('deviseId');
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
