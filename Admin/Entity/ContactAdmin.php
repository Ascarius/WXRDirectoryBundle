<?php

namespace WXR\DirectoryBundle\Admin\Entity;

use Sonata\AdminBundle\Form\FormMapper;

use WXR\DirectoryBundle\Admin\Model\ContactAdmin as BaseContactAdmin;

class ContactAdmin extends BaseContactAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);

        $formMapper
            ->with('form.group_categories')
                ->add('categories', 'sonata_type_model', array(
                    'class' => 'Application\\WXR\\DirectoryBundle\\Entity\\Category',
                    'multiple' => true,
                    'expanded' => true,
                    'required' => false
                ))
            ->end()
        ;

        return $formMapper;
    }
}
