<?php

namespace Success\NewsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class BaseNewsController extends Controller {

    /**
     * @param integer $postId
     *
     * @return Response
     */
    public function commentsAction($postId)
    {
        /*$pager = $this->getCommentManager()
            ->getPager(array(
                'postId' => $postId,
                'status'  => CommentInterface::STATUS_VALID
            ), 1, 500); //no limit

        return $this->render('SonataNewsBundle:Post:comments.html.twig', array(
            'pager'  => $pager,
        ));*/
      return $this->render('OK');
    }
  
}