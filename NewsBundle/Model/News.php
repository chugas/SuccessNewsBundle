<?php

namespace Success\NewsBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
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
   * @Gedmo\Translatable
   * @ORM\Column(name="title", type="string", length=100, nullable=false)
   */
  protected $title;

  /**
   * @var string $content
   *
   * @Gedmo\Translatable
   * @ORM\Column(name="content", type="text", nullable=false)
   */
  protected $content;

  /**
   * @var boolean $published
   *
   * @ORM\Column(name="published", type="boolean")
   */
  protected $published;

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
  
  /**
   * @ORM\OneToMany(
   *   targetEntity="\Success\NewsBundle\Entity\NewsTranslation",
   *   mappedBy="object",
   *   cascade={"persist", "remove"}
   * )
   */
  protected $translations;

  public function getTranslations() {
    return $this->translations;
  }

  /**
   * Set translations
   *
   * @param ArrayCollection $translations
   * @return News
   */
  public function setTranslations($translations) {
    foreach ($translations as $translation) {
      $translation->setObject($this);
    }

    $this->translations = $translations;
    return $this;
  }

  /**
   * Add translations
   *
   * @param Success\NewsBundle\Entity\NewsTranslation $translations
   * @return News
   */
  public function addTranslation(\Success\NewsBundle\Entity\NewsTranslation $translations) {
    $this->translations[] = $translations;

    return $this;
  }

  /**
   * Remove translations
   *
   * @param Success\NewsBundle\Entity\NewsTranslation $translations
   */
  public function removeTranslation(\Success\NewsBundle\Entity\NewsTranslation $translations) {
    $this->translations->removeElement($translations);
  }  

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
   * Constructor
   */
  public function __construct() {
    $this->translations = new ArrayCollection();
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
