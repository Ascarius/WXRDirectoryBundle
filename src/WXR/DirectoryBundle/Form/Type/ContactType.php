<?php

namespace WXR\DirectoryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use WXR\GeoBundle\Form\Type\LocationType;

class ContactType extends AbstractType
{
    protected $class;

    protected $locationType;

    public function __construct($class, $locationType)
    {
        $this->class = $class;
        $this->locationType = $locationType;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('enabled', 'checkbox', array(
                'label' => 'contact.enabled'
            ))
            ->add('name', 'text', array(
                'label' => 'contact.name'
            ))
            ->add('description', 'textarea', array(
                'required' => false,
                'label' => 'contact.description'
            ))
            ->add('location', $this->locationType)
            ->add('phone', 'text', array(
                'required' => false,
                'label' => 'contact.phone'
            ))
            ->add('mobile', 'text', array(
                'required' => false,
                'label' => 'contact.mobile'
            ))
            ->add('email', 'text', array(
                'required' => false,
                'label' => 'contact.email'
            ))
            ->add('website', 'text', array(
                'required' => false,
                'label' => 'contact.website'
            ))
        ;
    }

    public function getName()
    {
        return 'contact';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'translation_domain' => 'WXRDirectoryBundle'
        ));
    }

}
