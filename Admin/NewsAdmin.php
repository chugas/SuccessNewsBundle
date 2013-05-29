<?php

namespace Success\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
//In order to use service for prePersist and preUpdate
use Knp\Menu\ItemInterface as MenuItemInterface;

class NewsAdmin extends Admin {

  protected $entity_manager;

  public function __construct($code, $class, $baseControllerName, $entity_manager) {
    parent::__construct($code, $class, $baseControllerName);
    $this->entity_manager = $entity_manager;
  }

  public function prePersist($news) {
    //$user = $this->container->get('security.context')->getToken()->getUser();
    //$news->setAuthor($user);
  }

  // setup the default sort column and order
  protected $datagridValues = array(
      '_sort_order' => 'DESC',
      '_sort_by' => 'created'
  );

  /**
   * Create and Edit
   * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
   *
   * @return void
   */
  protected function configureFormFields(FormMapper $formMapper) {
    $formMapper
            ->add('title')
            ->add('published', null, array('required' => false))
            ->add('content', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce span8',
                    'data-theme' => 'simple', // simple, advanced, bbcode,
                    'rows' => 20
                    )))
            ->end()
    ;
  }

  /**
   * List
   * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
   *
   * @return void
   */
  protected function configureListFields(ListMapper $listMapper) {
    $listMapper
            ->addIdentifier('id')
            ->addIdentifier('title')
            ->add('published', null, array('editable' => true))
            //->add('author', null, array('label' => 'Author'))
            ->add('created', null, array('label' => 'Created on'))
    ;
  }

  /**
   * Filters
   * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
   *
   * @return void
   */
  protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
    $datagridMapper
            ->add('id')
            ->add('published')
            ->add('title')
            //->add('author')
            ->add('created')
    ;
  }

  protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
    if (!$childAdmin && !in_array($action, array('edit'))) {
      return;
    }

    $admin = $this->isChild() ? $this->getParent() : $this;

    $id = $admin->getRequest()->get('id');

    $menu->addChild(
      $this->trans('sidemenu.link_view_news'), array('uri' => $admin->generateUrl('edit', array('id' => $id)))
    );
    /*$uri = $this->container->get('router')->generate('success_noticias_comment_list', array('id' => $id));
    $menu->addChild(
      $this->trans('sidemenu.link_view_comments'), array('uri' => $uri)
    );*/
  }

}