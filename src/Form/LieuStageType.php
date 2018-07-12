<?php

namespace App\Form;

use App\Entity\LieuStage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieu_nom')
            ->add('etablissement_nom')
            ->add('adresse')
            ->add('code_postal')
            ->add('commune')
            ->add('tel')
            ->add('latitude')
            ->add('longitude')
            ->add('divers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LieuStage::class,
        ]);
    }
}
