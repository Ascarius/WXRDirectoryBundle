<?php

namespace WXR\DirectoryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\CategoryBundle\Entity\Category;
use WXR\DirectoryBundle\Model\ContactInterface;
use WXR\DirectoryBundle\Model\GroupInterface;

class Group extends Category implements GroupInterface
{
    /**
     * @var ArrayCollection
     */
    protected $contacts;


    public function __construct()
    {
        parent::__construct();
        $this->contacts = new ArrayCollection();
    }

    /**
     * {@inheritDoc}
     */
    public function addContact(ContactInterface $contact)
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeContact(ContactInterface $contact)
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getContacts()
    {
        return $this->contacts->toArray();
    }
}
