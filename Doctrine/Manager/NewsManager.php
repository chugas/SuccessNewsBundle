<?php

namespace Success\NewsBundle\Doctrine\Manager;

class NewsManager {

  protected $objectManager;
  protected $class;
  protected $repository;

  public function __construct($em, $class) {
    $this->objectManager = $em;
    $this->repository = $em->getRepository($class);

    $metadata = $em->getClassMetadata($class);
    $this->class = $metadata->getName();
  }
  
  /**
   * Returns an empty user instance
   *
   * @return Application\Success\NewsBundle\Model\News
   */
  public function create() {
    $class = $this->getClass();
    $news = new $class;

    return $news;
  }

  /**
   * {@inheritDoc}
   */
  public function reload($news) {
    $this->objectManager->refresh($news);
  }

  /**
   * Updates a news.
   *
   * @param Application\Success\NewsBundle\Model\News $news
   * @param Boolean       $andFlush Whether to flush the changes (default true)
   */
  public function update($news, $andFlush = true) {
    $this->objectManager->persist($news);
    if ($andFlush) {
      $this->objectManager->flush();
    }
  }  

  public function delete($news) {
    $this->objectManager->remove($news);
    $this->objectManager->flush();
  }

  /**
   * {@inheritDoc}
   */
  public function getClass() {
    return $this->class;
  }

}
