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
    public function getSearchableProperties()
    {
        return array(
            $this->alias.'.fullname',
            'group.name'
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function buildFromClause(QueryBuilder $qb, array $criteria)
    {
        parent::buildFromClause($qb, $criteria);

        $needJoins = false;

        foreach (array('_search', 'group') as $needle) {
            foreach ($criteria as $criterium => $value) {
                if (false !== strpos($criterium, $needle)) {
                    $needJoins = true;
                    break 2;
                }
            }
        }

        if ($needJoins) {
            $qb
                ->leftJoin($this->alias.'.groups', 'group')
            ;
        }
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
