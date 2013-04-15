<?php

namespace Success\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
//In order to use service for prePersist and preUpdate
use Symfony\Component\DependencyInjection\ContainerInterface;

use Knp\Menu\ItemInterface as MenuItemInterface;

class NewsAdmin extends Admin {

  protected $container;
  
  public function __construct($code, $class, $baseControllerName, ContainerInterface $container) {
    parent::__construct($code, $class, $baseControllerName);
    $this->container = $container;
  }

  public function prePersist($news) {
    //$user = $this->container->get('security.context')->getToken()->getUser();
    //$news->setAuthor($user);
  }

  // setup the default sort column and order
  protected $datagridValues = array(
      '_sort_order' => 'ASC',
      '_sort_by' => 'title'
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
                        'data-theme' => 'simple',  // simple, advanced, bbcode,
                        'rows' => 20
                    )))
            
            ->with('Traducciones')
              ->add('translations', 'a2lix_translations', array(
                  'required' => false,                     // [optional] Overrides default_required if need
                  'fields' => array(                      // [optional] Manual configuration of fields to display and options. If not specified, all translatable fields will be display, and options will be auto-detected
                      'title' => array(
                          'label' => 'Titulo',              // [optional] Custom label. Ucfirst, otherwise
                      ),
                      'content' => array(
                          'label' => 'Descripcion',
                          'attr' => array('style' => 'width:600px; height: 400px', 'class' => 'tinymce', 'data-theme' => 'medium', 'rows' => 20)
                      )
                  )
              ))
            ->end()
            
            ->setHelps(array(
                'content' => 'Write a news, dude.',
            ))
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
  
    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit'))) {
            return;
        }

        $admin = $this->isChild() ? $this->getParent() : $this;

        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            $this->trans('sidemenu.link_view_post'),
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );

        $menu->addChild(
            $this->trans('sidemenu.link_view_comments'),
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );
    }  

}