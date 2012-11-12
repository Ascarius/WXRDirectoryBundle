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
            ->with('form.group_general')
                ->add('fullname')
                ->add('description', null, array(
                    'required' => false,
                    'attr' => array('data-wysiwyg' => true, 'rows' => 8)
                ))
            ->end()
            ->with('form.group_particulars')
                ->add('location', 'sonata_type_admin', array(), array('edit' => 'inline'))
                ->add('phone', null, array(
                    'required' => false
                ))
                ->add('fax', null, array(
                    'required' => false
                ))
                ->add('mobile', null, array(
                    'required' => false
                ))
                ->add('email', null, array(
                    'required' => false
                ))
                ->add('website', null, array(
                    'required' => false
                ))
            ->end()
            ->with('form.group_groups')
                ->add('groups', 'sonata_type_model', array(
                    'class' => 'WXR\\DirectoryBundle\\Entity\\Group',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false
                ))
            ->end()
            ->with('form.group_options')
                ->add('enabled', null, array(
                    'required' => false
                ))
                ->add('position', 'integer', array(
                    'required' => false
                ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fullname')
            ->add('description')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('fullname')
            ->add('groups')
            ->add('location')
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
