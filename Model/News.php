<?php

namespace Success\NewsBundle\Model;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Success\NewsBundle\Model\NewsInterface;

/**
 * News
 */
abstract class News implements NewsInterface {

  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string $title
   *
   * @ORM\Column(name="title", type="string", length=100, nullable=false)
   */
  protected $title;

  /**
   * @var string $abstract
   *
   * @ORM\Column(name="abstract", type="text", nullable=false)
   */
  protected $abstract;  
  
  /**
   * @var string $content
   *
   * @ORM\Column(name="content", type="text", nullable=false)
   */
  protected $content;

  /**
   * @var boolean $published
   *
   * @ORM\Column(name="published", type="boolean", options={"default" = 1})
   */
  protected $published;
  
  /**
   * @var datetime $date_published
   * 
   * @ORM\Column(name="date_published", type="datetime", nullable=true)
   */
  protected $date_published;

  /**
   * @Gedmo\Timestampable(on="create")
   * @ORM\Column(name="created", type="datetime")
   */
  protected $created;

  /**
   * @ORM\Column(name="updated", type="datetime")
   * @Gedmo\Timestampable(on="update")
   */
  protected $updated;

  public function __toString() {
    return (string) $this->title;
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
    return $this->id;
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
   * @param datetime $date_published
   * @return News
   */
  public function setDatePublished($date_published) {
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
  public function setCreated($created) {
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
  public function setUpdated($updated) {
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
