<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UsersAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('username', 'text')
                   ->add('email', 'email')
                   ->add('password', 'password')
                   ->add('firstname','text')
                   ->add('lastname','text')
                   ->add('location','text')
                   ->add('dateOfBirth','date')
                   ->add('paypalAccount','text')
                   ->add('roles','text')

                   ;


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')


        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username')
                   ->addIdentifier('firstname','text')
                   ->addIdentifier('lastname','text')
                   ->addIdentifier('location','text')
                   ->addIdentifier('dateOfBirth','date')
                   ->addIdentifier('paypalAccount','text')
                   ->add('roles','text')



        ;
    }
}
