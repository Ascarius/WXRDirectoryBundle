<?php

namespace WXR\DirectoryBundle\Controller\Admin;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactAdminController extends Controller
{
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_CONTACT_ADMIN_LIST')) {
            throw new AccessDeniedHttpException();
        }

        $contacts = $this->getContactManager()->findAll();

        return $this->render('WXRDirectoryBundle:Contact:list.html.twig', compact('contacts'));
    }

    public function addAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_CONTACT_ADMIN_ADD')) {
            throw new AccessDeniedHttpException();
        }

        $contact = $this->getContactManager()->create();

        $handler = $this->get('wxr_directory.contact.form.handler');
        $form = $handler->getForm();

        if ($handler->process($contact)) {
            $this->get('session')->setFlash('success', 'wxr_directory.contact.added');

            return $this->redirect($this->generateUrl('wxr_directory_contact_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:Contact:add.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView()
        ));
    }

    public function editAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_CONTACT_ADMIN_EDIT')) {
            throw new AccessDeniedHttpException();
        }

        $contact = $this->getContactManager()->find($id);

        if (null === $contact) {
            throw $this->createNotFoundException('wxr_directory.contact.not_found');
        }

        $handler = $this->get('wxr_directory.contact.form.handler');
        $form = $handler->getForm();

        if ($handler->process($contact)) {
            $this->get('session')->setFlash('success', 'wxr_directory.contact.updated');

            return $this->redirect($this->generateUrl('wxr_directory_contact_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:Contact:edit.html.twig', array(
            'contact' => $contact,
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_CONTACT_ADMIN_DELETE')) {
            throw new AccessDeniedHttpException();
        }

        $contact = $this->getContactManager()->find($id);

        if (null === $contact) {
            throw $this->createNotFoundException('wxr_directory.contact.not_found');
        }

        if ($this->getRequest()->query->get('confirm')) {

            $this->getContactManager()->remove($contact);
            $this->get('session')->setFlash('success', 'wxr_directory.contact.deleted');

            return $this->redirect($this->generateUrl('wxr_directory_contact_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:ContactAdmin:delete.html.twig', compact('country'));
    }

    /**
     * @return WXR\DirectoryBundle\Model\ContactManagerInterface
     */
    protected function getContactManager()
    {
        return $this->get('wxr_directory.contact.manager');
    }
}
