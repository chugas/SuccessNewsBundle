<?php

namespace Success\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CommentAdmin extends Admin
{  
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        /*if (!$this->isChild()) {
            $formMapper->add('post', 'sonata_type_model_list');
        }*/
        /*
        thread_id
        author_id
        body
        ancestors
        depth
        created_at
        state
*/
        //$commentClass = $this->commentManager->getClass();

        $formMapper
            ->add('author')
            ->add('body')
            //->add('url', null, array('required' => false))
            //->add('message')
            //->add('status', 'choice', array('choices' => $commentClass::getStatusList(), 'expanded' => true, 'multiple' => false))
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('body')
            ->add('author')
            ->add('state')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('body')
            ->add('thread')
            ->add('author')
            ->add('state');
    }

    /**
     * {@inheritdoc}
     */
    /*public function getBatchActions()
    {
        $actions = parent::getBatchActions();

        $actions['enabled'] = array(
            'label'            => $this->trans($this->getLabelTranslatorStrategy()->getLabel('enable', 'batch', 'comment')),
            'ask_confirmation' => false,
        );

        $actions['disabled'] = array(
            'label'            =>  $this->trans($this->getLabelTranslatorStrategy()->getLabel('disable', 'batch', 'comment')),
            'ask_confirmation' => false
        );

        return $actions;
    }*/

}
