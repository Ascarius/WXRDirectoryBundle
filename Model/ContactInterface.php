<?php

namespace WXR\DirectoryBundle\Model;

use WXR\GeoBundle\Model\AddressInterface;

interface ContactInterface
{
    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set category
     *
     * @param CategoryInterface[] $categories
     * @return ContactInterface
     */
    public function setCategories($categories);

    /**
     * Add category
     *
     * @param CategoryInterface $category
     * @return ContactInterface
     */
    public function addCategory(CategoryInterface $category);

    /**
     * Remove category
     *
     * @param CategoryInterface $category
     * @return ContactInterface
     */
    public function removeCategory(CategoryInterface $category);

    /**
     * Clear categories
     *
     * @return ContactInterface
     */
    public function clearCategories();

    /**
     * Get category
     *
     * @return CategoryInterface[]
     */
    public function getCategories();

    /**
     * Has category
     *
     * @param CategoryInterface $category
     * @return boolean
     */
    public function hasCategory(CategoryInterface $category);

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
     * Set slug
     *
     * @param string $slug
     * @return ContactInterface
     */
    public function setSlug($slug);

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug();

    /**
     * Set fullname
     *
     * @param string $fullname
     * @return ContactInterface
     */
    public function setFullname($fullname);

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname();

    /**
     * Set description
     *
     * @param string $description
     * @return ContactInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set address
     *
     * @param AddressInterface $address
     * @return ContactInterface
     */
    public function setAddress(AddressInterface $address);

    /**
     * Get address
     *
     * @return Address
     */
    public function getAddress();

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
     * Set fax
     *
     * @param string $fax
     * @return ContactInterface
     */
    public function setFax($fax);

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax();

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
     * Set position
     *
     * @param integer $position
     * @return ContactInterface
     */
    public function setPosition($position);

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition();

    /**
     * Set created at
     *
     * @param \DateTime $createdAt
     * @return ContactInterface
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * Get created at
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set updated at
     *
     * @param \DateTime $updatedAt
     * @return ContactInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Get updated at
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @return string
     */
    public function __toString();
}
