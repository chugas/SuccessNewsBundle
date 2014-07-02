<?php

namespace Success\NewsBundle\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository {

  public function getQueryBuilder($alias = 'n') {
    return $this->createQueryBuilder($alias);
  }

  public function findLastNewsQueryBuilder() {
    return $this->getQueryBuilder('n')
            ->where('n.published = true')
            ->orderby('n.createdAt', 'DESC');
  }

}
