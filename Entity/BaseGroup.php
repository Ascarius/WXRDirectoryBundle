<?php

namespace WXR\DirectoryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use WXR\CategoryBundle\Entity\BaseCategory;
use WXR\DirectoryBundle\Model\ContactInterface;
use WXR\DirectoryBundle\Model\GroupInterface;

class BaseGroup extends BaseCategory implements GroupInterface
{
}
