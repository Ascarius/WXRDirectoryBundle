<?php

namespace WXR\DirectoryBundle\Controller\Admin;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GroupAdminController extends Controller
{
    public function listAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_GROUP_ADMIN_LIST')) {
            throw new AccessDeniedHttpException();
        }

        $groups = $this->getGroupManager()->findAll();

        return $this->render('WXRDirectoryBundle:Group:list.html.twig', compact('groups'));
    }

    public function addAction()
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_GROUP_ADMIN_ADD')) {
            throw new AccessDeniedHttpException();
        }

        $group = $this->getGroupManager()->create();

        $handler = $this->get('wxr_directory.group.form.handler');
        $form = $handler->getForm();

        if ($handler->process($group)) {
            $this->get('session')->setFlash('success', 'wxr_directory.group.added');

            return $this->redirect($this->generateUrl('wxr_directory_group_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:Group:add.html.twig', array(
            'group' => $group,
            'form' => $form->createView()
        ));
    }

    public function editAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_GROUP_ADMIN_EDIT')) {
            throw new AccessDeniedHttpException();
        }

        $group = $this->getGroupManager()->find($id);

        if (null === $group) {
            throw $this->createNotFoundException('wxr_directory.group.not_found');
        }

        $handler = $this->get('wxr_directory.group.form.handler');
        $form = $handler->getForm();

        if ($handler->process($group)) {
            $this->get('session')->setFlash('success', 'wxr_directory.group.updated');

            return $this->redirect($this->generateUrl('wxr_directory_group_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:Group:edit.html.twig', array(
            'group' => $group,
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        if (!$this->get('security.context')->isGranted('ROLE_WXR_DIRECTORY_GROUP_ADMIN_DELETE')) {
            throw new AccessDeniedHttpException();
        }

        $group = $this->getGroupManager()->find($id);

        if (null === $group) {
            throw $this->createNotFoundException('wxr_directory.group.not_found');
        }

        if ($this->getRequest()->query->get('confirm')) {

            $this->getGroupManager()->remove($group);
            $this->get('session')->setFlash('success', 'wxr_directory.group.deleted');

            return $this->redirect($this->generateUrl('wxr_directory_group_admin_list'));
        }

        return $this->render('WXRDirectoryBundle:GroupAdmin:delete.html.twig', compact('country'));
    }

    /**
     * @return WXR\DirectoryBundle\Model\GroupManagerInterface
     */
    protected function getGroupManager()
    {
        return $this->get('wxr_directory.group.manager');
    }
}
