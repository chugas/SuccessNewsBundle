<?php

namespace Success\NewsBundle\Model;

interface NewsInterface {

  public function setTitle($title);

  public function getTitle();

  public function setContent($content);

  public function getContent();

  public function setAbstract($abstract);

  public function getAbstract();

  public function setPublished($published);
  
  public function getPublished();
  
  public function setDatePublished(\DateTime $date_published);
  
  public function getDatePublished();
  
  public function setCreated(\DateTime $created);
  
  public function getCreated();
  
  public function setUpdated(\DateTime $updated);

  public function getUpdated();
}
