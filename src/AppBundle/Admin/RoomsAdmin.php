<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class RoomsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')

                   ->add('localisation', 'textarea')
                   ->add('price', 'number')
                   ->add('surface', 'number')
                   ->add('equipements', 'textarea')
                   ->add('description', 'textarea')
                   ->add('ldk', 'sonata_type_model_hidden')
                   ->add('statut', 'textarea')

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
                   ->addIdentifier('currency_id')
        ;
    }
}
