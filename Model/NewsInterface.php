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

interface NewsInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title);

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle();

    /**
     * Set content
     *
     * @param string $content
     */
    public function setContent($content);

    /**
     * Get content
     *
     * @return string $content
     */
    public function getContent();

    /**
     * Set slug
     *
     * @param integer $slug
     */
    //public function setSlug($slug);

    /**
     * Get slug
     *
     * @return integer $slug
     */
    //public function getSlug();
}
