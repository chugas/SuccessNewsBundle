<?php

namespace Success\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class NewsAdmin extends Admin {

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
            ->add('date_published', null)
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
            ->add('date_published')
    ;
  }

}