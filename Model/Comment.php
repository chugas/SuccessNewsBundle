<?php

namespace Success\NewsBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;

abstract class Comment extends BaseComment {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * Thread of this comment
   *
   * @var Thread
   * @ORM\ManyToOne(targetEntity="Success\NewsBundle\Entity\Thread")
   */
  protected $thread;

}
