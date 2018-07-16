<?php

namespace App\Form;

use App\Entity\Tribunal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Tribunal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tribunal_nom')
            ->add('nature_tribunal_id')
            ->add('service_tribunal_id')
            ->add('autorite_tribunal_id')
            ->add('adresse')
            ->add('code_postal')
            ->add('commune')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tribunal::class,
        ]);
    }
}
