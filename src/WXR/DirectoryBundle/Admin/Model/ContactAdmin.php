<?php

namespace WXR\DirectoryBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

use WXR\DirectoryBundle\Enum\Civility;

class ContactAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('civility', 'sonata_type_translatable_choice', array(
                'required' => false,
                'label' => 'contact.civility',
                'choices' => Civility::getList()
            ))
            ->add('firstname', null, array(
                'label' => 'contact.firstname',
                'required' => false,
            ))
            ->add('lastname', null, array(
                'label' => 'contact.lastname'
            ))
            ->add('description', null, array(
                'required' => false,
                'label' => 'contact.description'
            ))
            ->add('location', 'sonata_type_admin', array(), array('edit' => 'inline'))
            ->add('phone', null, array(
                'required' => false,
                'label' => 'contact.phone'
            ))
            ->add('fax', null, array(
                'required' => false,
                'label' => 'contact.fax'
            ))
            ->add('mobile', null, array(
                'required' => false,
                'label' => 'contact.mobile'
            ))
            ->add('email', null, array(
                'required' => false,
                'label' => 'contact.email'
            ))
            ->add('website', null, array(
                'required' => false,
                'label' => 'contact.website'
            ))
            ->add('groups', 'entity', array(
                'label' => 'group.groups',
                'class' => 'WXR\\DirectoryBundle\\Entity\\Group',
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname', null, array(
                'label' => 'contact.firstname'
            ))
            ->add('lastname', null, array(
                'label' => 'contact.lastname'
            ))
            ->add('description', null, array(
                'label' => 'contact.description'
            ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstname', null, array(
                'label' => 'contact.firstname'
            ))
            ->addIdentifier('lastname', null, array(
                'label' => 'contact.lastname'
            ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('email')
                ->assertEmail()
            ->end()
            ->with('website')
                ->assertUrl()
            ->end()
        ;
    }
}
