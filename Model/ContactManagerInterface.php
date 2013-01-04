<?php

namespace WXR\DirectoryBundle\Model;

use WXR\CommonBundle\Model\BaseManagerInterface;

interface ContactManagerInterface extends BaseManagerInterface
{
    /**
     * Find one by slug
     *
     * @param string
     * @return ContactInterface|null
     */
    public function findOneBySlug($slug);

    /**
     * Find last updated
     *
     * @return ContactInterface|null
     */
    public function findLastUpdated();
}
