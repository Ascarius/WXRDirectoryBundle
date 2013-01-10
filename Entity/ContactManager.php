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
        return $this->findOneBy(array(
            'slug' => $slug,
            'required' => true
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function findLastUpdated()
    {
        $contact = $this->findBy(
            array(),
            array('updatedAt' => 'DESC'),
            1
        );

        if ($contact) {
            return current($contact);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getSearchableProperties()
    {
        return array(
            $this->alias.'.fullname',
            'category.name'
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function buildFromClause(QueryBuilder $qb, array $criteria)
    {
        parent::buildFromClause($qb, $criteria);

        $needJoins = false;

        foreach (array('_search', 'category') as $needle) {
            foreach ($criteria as $criterium => $value) {
                if (false !== strpos($criterium, $needle)) {
                    $needJoins = true;
                    break 2;
                }
            }
        }

        if ($needJoins) {
            $qb
                ->leftJoin($this->alias.'.categories', 'category')
            ;
        }
    }

    /**
     * {@inheritDoc}
     */
    protected function buildOrderClause(QueryBuilder $qb, array $orderBy = null)
    {
        if (!$orderBy) {
            $orderBy = array('position' => 'ASC', 'fullname' => 'ASC');
        }

        return parent::buildOrderClause($qb, $orderBy);
    }
}
