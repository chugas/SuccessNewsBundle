<?php

namespace Success\NewsBundle\Model;

use Success\NewsBundle\Model\NewsInterface;

class News implements NewsInterface {

  protected $title;

  protected $abstract;  
  
  protected $content;

  protected $published;
  
  protected $date_published;

  protected $created;

  protected $updated;

  public function __toString() {
    return (string) $this->title;
  }

  /**
   * Set title
   *
   * @param string $title
   * @return News
   */
  public function setTitle($title) {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string 
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Set content
   *
   * @param string $content
   * @return News
   */
  public function setContent($content) {
    $this->content = $content;

    return $this;
  }

  /**
   * Get content
   *
   * @return string 
   */
  public function getContent() {
    return $this->content;
  }
  
  /**
   * Set abstract
   *
   * @param string $abstract
   * @return News
   */
  public function setAbstract($abstract) {
    $this->abstract = $abstract;

    return $this;
  }

  /**
   * Get abstract
   *
   * @return string 
   */
  public function getAbstract() {
    return $this->abstract;
  }  

  /**
   * Set published
   *
   * @param boolean $published
   * @return News
   */
  public function setPublished($published) {
    $this->published = $published;

    return $this;
  }

  /**
   * Get published
   *
   * @return boolean 
   */
  public function getPublished() {
    return $this->published;
  }
  
  /**
   * Set published
   *
   * @param \DateTime $date_published
   * @return News
   */
  public function setDatePublished(\DateTime $date_published) {
    $this->date_published = $date_published;

    return $this;
  }

  /**
   * Get published
   *
   * @return boolean 
   */
  public function getDatePublished() {
    return $this->date_published;
  }  

  /**
   * Set created
   *
   * @param \DateTime $created
   * @return Producto
   */
  public function setCreated(\DateTime $created) {
    $this->created = $created;

    return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime 
   */
  public function getCreated() {
    return $this->created;
  }

  /**
   * Set updated
   *
   * @param \DateTime $updated
   * @return Producto
   */
  public function setUpdated(\DateTime $updated) {
    $this->updated = $updated;

    return $this;
  }

  /**
   * Get updated
   *
   * @return \DateTime 
   */
  public function getUpdated() {
    return $this->updated;
  }

}
