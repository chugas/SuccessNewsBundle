<?php

/*
 * This file is part of the Success project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Success\NewsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BaseNewsRepository extends EntityRepository
{

    /**
     * return last post query builder
     *
     * @param int $limit
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findLastNewsQueryBuilder($limit)
    {
        return $this->createQueryBuilder('n')
            ->where('n.published = true')
            ->orderby('n.createdAt', 'DESC');

    }

}
