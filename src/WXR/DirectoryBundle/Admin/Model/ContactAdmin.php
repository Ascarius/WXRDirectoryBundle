<?php

namespace WXR\DirectoryBundle\Admin\Model;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ContactAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label' => 'wxr_directory.contact.name'
            ))
            ->add('description', null, array(
                'required' => false,
                'label' => 'wxr_directory.contact.description'
            ))
            ->add('location', 'sonata_type_admin', array(), array('edit' => 'inline'))
            ->add('phone', null, array(
                'required' => false,
                'label' => 'wxr_directory.contact.phone'
            ))
            ->add('mobile', null, array(
                'required' => false,
                'label' => 'wxr_directory.contact.mobile'
            ))
            ->add('email', null, array(
                'required' => false,
                'label' => 'wxr_directory.contact.email'
            ))
            ->add('website', null, array(
                'required' => false,
                'label' => 'wxr_directory.contact.website'
            ))
            ->add('groups', 'entity', array(
                'label' => 'wxr_directory.group.groups',
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
            ->add('name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
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
