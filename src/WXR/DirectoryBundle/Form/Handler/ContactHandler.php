<?php

namespace WXR\ContactBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use WXR\ContactBundle\Model\ContactInterface;
use WXR\ContactBundle\Model\ContactManagerInterface;

class ContactHandler
{
    protected $request;

    protected $form;

    protected $contactManager;

    public function __construct(Request $request, FormInterface $form, ContactManagerInterface $contactManager)
    {
        $this->request = $request;
        $this->form = $form;
        $this->contactManager = $contactManager;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function process(ContactInterface $contact)
    {
        $this->form->setData($contact);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($contact);

                return true;
            }
        }

        return false;
    }

    protected function onSuccess(ContactInterface $contact)
    {
        $this->contactManager->persist($contact);
    }
}
