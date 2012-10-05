<?php

namespace WXR\DirectoryBundle\Model;

use WXR\GeoBundle\Model\LocationInterface;

interface ContactInterface
{
    public function getId();

    public function setEnabled($enabled);

    public function getEnabled();

    public function setName($name);

    public function getName();

    public function setDecription($description);

    public function getDescription();

    public function setLocation(LocationInterface $location);

    public function getLocation();

    public function setPhone($phone);

    public function getPhone();

    public function setMobile($mobile);

    public function getMobile();

    public function setEmail($email);

    public function getEmail();

    public function setWebsite($website);

    public function getWebsite();

    /**
     * @return string
     */
    public function __toString();
}
