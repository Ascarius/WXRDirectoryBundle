<?php

namespace WXR\DirectoryBundle\Model;

use WXR\DirectoryBundle\Enum\Civility;
use WXR\GeoBundle\Model\LocationInterface;

abstract class Contact implements ContactInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var GroupInterface[]
     */
    protected $groups;

    /**
     * @var boolean
     */
    protected $enabled;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $fullname;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $location;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $mobile;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $website;

    /**
     * @var integer
     */
    protected $position;


    public function __construct()
    {
        $this->enabled = true;
        $this->groups = array();
        $this->position = 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setGroups($groups)
    {
        $this->clearGroups();

        foreach ($groups as $group) {
            $this->addGroup($group);
        }

        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function addGroup(GroupInterface $group)
    {
        if (! $this->hasGroup($group)) {
            $group->addContact($this);
            $this->groups[] = $group;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeGroup(GroupInterface $group)
    {
        if (false !== ($key = array_search($group, $this->groups, true))) {
            $group->removeContact($this);
            unset($this->groups[$key]);
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

        $this->contacts = array();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * {@inheritDoc}
     */
    public function hasGroup(GroupInterface $group)
    {
        return false !== array_search($group, $this->groups, true);
    }

    /**
     * {@inheritDoc}
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritDoc}
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * {@inheritDoc}
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setLocation(LocationInterface $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * {@inheritDoc}
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritDoc}
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * {@inheritDoc}
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->getFullname();
    }
}
