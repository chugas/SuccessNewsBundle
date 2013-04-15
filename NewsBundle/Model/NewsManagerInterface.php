<?php

/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Success\NewsBundle\Model;

use Success\NewsBundle\Model\NewsInterface;

interface NewsManagerInterface
{
    /**
     * Creates an empty post instance
     *
     * @return News
     */
    public function create();

    /**
     * Deletes a post
     *
     * @param News $news
     *
     * @return void
     */
    public function delete(NewsInterface $news);

    /**
     * Finds one News by the given criteria
     *
     * @param array $criteria
     *
     * @return PostInterface
     */
    public function findOneBy(array $criteria);

    /**
     * Finds one post by the given criteria
     *
     * @param array $criteria
     *
     * @return News
     */
    public function findBy(array $criteria);

    /**
     * Returns the post's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Save a post
     *
     * @param News $news
     *
     * @return void
     */
    public function save(NewsInterface $news);
}
