<?php

namespace WXR\DirectoryBundle\Entity;

use Doctrine\ORM\QueryBuilder;

use WXR\CommonBundle\Entity\BaseManager;
use WXR\DirectoryBundle\Model\ContactManagerInterface;

class ContactManager extends BaseManager implements ContactManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findOneBySlug($slug)
    {
        return $this->findOneBy(array('slug' => $slug));
    }

    /**
     * {@inheritDoc}
     */
    protected function buildWhereClause(QueryBuilder $qb, array $criteria)
    {
        if (!array_key_exists('enabled', $criteria)) {
            $criteria['enabled'] = true;
        }

        return parent::buildWhereClause($qb, $criteria);
    }

    /**
     * {@inheritDoc}
     */
    protected function buildOrderClause(QueryBuilder $qb, array $orderBy = null)
    {
        $default = array('position' => 'ASC', 'fullname' => 'ASC');

        $orderBy = $orderBy ?
            array_merge($default, $orderBy) : $default;

        return parent::buildOrderClause($qb, $orderBy);
    }
}
