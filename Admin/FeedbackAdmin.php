<?php

namespace Grossum\FeedbackBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FeedbackAdmin extends Admin
{
    /**
     * Fields to be shown on create/edit forms
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $disabled = $this->getSubject() && $this->getSubject()->getId();
        $formMapper
            ->add('name', null, ['label' => 'Имя', 'disabled' => $disabled])
            ->add('email', null, ['label' => 'E-Mail', 'disabled' => $disabled])
            ->add('message', null, ['label' => 'Сообщение', 'disabled' => $disabled])
            ->add('readed', null, ['label' => 'Просмотрен', 'required' => false]);
    }

    /**
     * Fields to be shown on filter forms
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('email', null, ['label' => 'E-Mail'])
            ->add('readed', null, ['label' => 'Просмотрен']);
    }

    /**
     * Fields to be shown on lists
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name', null, ['label' => 'Имя'])
            ->add('email', null, ['label' => 'E-Mail']);
    }
}
