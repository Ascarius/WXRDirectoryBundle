<?php

namespace WXR\DirectoryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\DirectoryBundle\Model\Contact;
use WXR\DirectoryBundle\Model\CategoryInterface;
use Application\WXR\GeoBundle\Entity\Address;

abstract class BaseContact extends Contact
{
    public function __construct()
    {
        parent::__construct();
        $this->address = new Address();
        $this->categories = new ArrayCollection();
    }

    /**
     * Update updatedAt
     */
    public function onPreUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function addCategory(CategoryInterface $category)
    {
        if (! $this->hasCategory($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeCategory(CategoryInterface $category)
    {
        if ($this->hasCategory($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearCategories()
    {
        $this->categories = new ArrayCollection();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasCategory(CategoryInterface $category)
    {
        return $this->categories->contains($category);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress()
    {
        return $this->address;
    }
}
