<?php

namespace App\Form;

use App\Entity\ModeEnvoiConvoc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeEnvoiConvocType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('courrier')
            ->add('email')
            //->add('suiviDossiers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ModeEnvoiConvoc::class,
        ]);
    }
}
