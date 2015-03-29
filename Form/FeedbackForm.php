<?php

namespace Grossum\FeedbackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedbackForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [])
            ->add('email', null, [])
            ->add('message', null, [])
            ->add('save', 'submit', ['label' => 'Написать нам']);
    }

    public function getName()
    {
        return 'feedback';
    }
}
