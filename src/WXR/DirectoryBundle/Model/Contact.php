<?php

namespace WXR\DirectoryBundle\Model;

abstract class Contact implements ContactInterface
{
    protected $id;

    protected $enabled;

    protected $name;

    protected $description;

    protected $location;

    protected $phone;

    protected $mobile;

    protected $email;

    protected $website;


    public function getId()
    {
        return $this->id;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDecription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setLocation(LocationInterface $location)
    {
        $this->location = $location;

        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->getName();
    }
}
