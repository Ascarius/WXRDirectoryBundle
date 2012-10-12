<?php

namespace WXR\DirectoryBundle\Model;

use WXR\GeoBundle\Model\LocationInterface;

interface ContactInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set group
     *
     * @param GroupInterface[] $groups
     * @return ContactInterface
     */
    public function setGroups($groups);

    /**
     * Add group
     *
     * @param GroupInterface $group
     * @return ContactInterface
     */
    public function addGroup(GroupInterface $group);

    /**
     * Remove group
     *
     * @param GroupInterface $group
     * @return ContactInterface
     */
    public function removeGroup(GroupInterface $group);

    /**
     * Clear groups
     *
     * @return ContactInterface
     */
    public function clearGroups();

    /**
     * Get group
     *
     * @return GroupInterface[]
     */
    public function getGroups();

    /**
     * Has group
     *
     * @param GroupInterface $group
     * @return boolean
     */
    public function hasGroup(GroupInterface $group);

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return ContactInterface
     */
    public function setEnabled($enabled);

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled();

    /**
     * Set name
     *
     * @param string $name
     * @return ContactInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     * @return ContactInterface
     */
    public function setDecription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set location
     *
     * @param LocationInterface $location
     * @return ContactInterface
     */
    public function setLocation(LocationInterface $location);

    /**
     * Get location
     *
     * @return Location
     */
    public function getLocation();

    /**
     * Set phone
     *
     * @param string $phone
     * @return ContactInterface
     */
    public function setPhone($phone);

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return ContactInterface
     */
    public function setMobile($mobile);

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile();

    /**
     * Set email
     *
     * @param string $email
     * @return ContactInterface
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set website
     *
     * @param string $website
     * @return ContactInterface
     */
    public function setWebsite($website);

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite();

    /**
     * @return string
     */
    public function __toString();
}
