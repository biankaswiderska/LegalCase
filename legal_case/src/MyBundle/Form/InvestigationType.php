<?php

namespace MyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvestigationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('addDate')->add('interrogationDate')->add('signature')->add('side')->add('comment')->add('investigationStatus')->add('investigationDefendants')->add('investigationPlaintiffs')->add('investigationWitnesses')->add('incidents')->add('clauses')->add('policeofficers')->add('prosecutionLawyers')->add('defenseLawyers')->add('lawsuits');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyBundle\Entity\Investigation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mybundle_investigation';
    }


}
