<?php

namespace WXR\DirectoryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\DirectoryBundle\Model\Contact;
use WXR\DirectoryBundle\Model\GroupInterface;
use WXR\GeoBundle\Entity\Location;

abstract class BaseContact extends Contact
{
    public function __construct()
    {
        parent::__construct();
        $this->location = new Location();
        $this->groups = new ArrayCollection();
    }

    /**
     * {@inheritDoc}
     */
    public function addGroup(GroupInterface $group)
    {
        if (! $this->hasGroup($group)) {
            $group->addContact($this);
            $this->groups->add($group);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeGroup(GroupInterface $group)
    {
        if ($this->hasGroup($group)) {
            $group->removeContact($this);
            $this->groups->removeElement($group);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearGroups()
    {
        foreach ($this->contacts as $contact) {
            $contact->removeContact($this);
        }

        $this->contacts = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasGroup(GroupInterface $group)
    {
        return $this->groups->contains($group);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocation()
    {
        // Prevent deletion
        if (null === $this->location) {
            $this->location = new Location();
        }

        return $this->location;
    }
}
