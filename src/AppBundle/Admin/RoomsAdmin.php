<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RoomsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
                   ->add('LDK', 'text')
                   ->add('host_id', 'number')
                   ->add('localisation', 'textarea')
                   ->add('price', 'number')
                   ->add('surface', 'number')
                   ->add('equipements', 'textarea')
                   ->add('description', 'textarea')
                   ->add('type_id', 'number')
                   ->add('statut', 'textarea')
                   ->add('devise_id', 'number')
                   ;


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title')
                       
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
                   ->addIdentifier('LDK')
                   ->addIdentifier('host_id')
                   ->addIdentifier('localisation')
                   ->addIdentifier('price')
                   ->addIdentifier('surface')
                   ->addIdentifier('equipements')
                   ->addIdentifier('description')
                   ->addIdentifier('type_id')
                   ->addIdentifier('statut')
                   ->addIdentifier('devise_id')
        ;
    }
}
