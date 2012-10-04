<?php

namespace WXR\DirectoryBundle\Entity;

use WXR\GeoBundle\Entity\Location;

class Contact extends BaseContact
{
    public function __construct()
    {
        $this->location = new Location();
    }
}
