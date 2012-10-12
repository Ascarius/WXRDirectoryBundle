<?php

namespace WXR\DirectoryBundle\Entity;

use WXR\DirectoryBundle\Model\Contact;
use WXR\GeoBundle\Entity\Location;

abstract class BaseContact extends Contact
{
    public function __construct()
    {
        $this->location = new Location();
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
