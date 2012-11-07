<?php

namespace WXR\DirectoryBundle\Model;

use WXR\CategoryBundle\Model\CategoryInterface;

/**
 * WXR\DirectoryBundle\Model\GroupInterface
 *
 * @author Lionel Gaillar <lionel.gaillard@wxrstudios.com>
 */
interface GroupInterface extends CategoryInterface
{
    /**
     * Add contact
     *
     * @param ContactInterface $contact
     * @return GroupInterface
     */
    public function addContact(ContactInterface $contact);

    /**
     * Remove contact
     *
     * @param ContactInterface $contact
     * @return GroupInterface
     */
    public function removeContact(ContactInterface $contact);

    /**
     * @return ContactInterface[]
     */
    public function getContacts();
}
