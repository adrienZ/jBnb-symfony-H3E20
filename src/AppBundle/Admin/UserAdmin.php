<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
      $currentYear = (integer)date("Y");
        $formMapper->add('username', 'text')
                   ->add('email', 'text')
                   ->add('password', 'password')
                   ->add('firstname', 'text')
                   ->add('lastname', 'text')
                   ->add('location', 'text')
                   ->add('dateOfBirth', 'date', [
                          'years' => range($currentYear, $currentYear - 100),
                      ]
                   )
                   ->add('deviseId','text')
                   ->add('isHost', HiddenType::class, array(
                     'required' => true,
                     'data' => 0,
                   ))
                   ->add('paypalAccount', HiddenType::class, array(
                     'required' => true,
                     'data' => 'moneyIsSoFunny',
                   ));


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $currentYear = (integer)date("Y");
        $listMapper->addIdentifier('username', 'text')
                   ->addIdentifier('email', 'email')
                   ->addIdentifier('firstname', 'text')
                   ->addIdentifier('lastname', 'text')
                   ->addIdentifier('location', 'text')
                   ->addIdentifier('dateOfBirth', 'date', [
                          'years' => range($currentYear, $currentYear - 100),
                      ]
                 )
                 ->add('deviseId', HiddenType::class, array(
                   'required' => true,
                   'data' => 0,
                 ))
                 ->add('isHost', HiddenType::class, array(
                   'required' => true,
                   'data' => 0,
                 ))
                 ->add('paypalAccount', HiddenType::class, array(
                   'required' => true,
                   'data' => 'moneyIsSoFunny',
                 ));
        ;
    }
}
