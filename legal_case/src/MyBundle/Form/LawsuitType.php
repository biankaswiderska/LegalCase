<?php

namespace MyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LawsuitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('addDate')->add('hearingDate')->add('signature')->add('side')->add('comment')->add('verdict')->add('verdictShort')->add('lawsuitStatus')->add('lawsuitDefendants')->add('lawsuitPlaintiffs')->add('lawsuitWitnesses')->add('investigations')->add('clauses')->add('prosecutionLawyers')->add('defenseLawyers')->add('court')->add('caseConnJudge')->add('verdictJudge');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyBundle\Entity\Lawsuit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mybundle_lawsuit';
    }


}
