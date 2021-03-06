<?php

namespace App\Form;

use App\Entity\Tribunal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TribunalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tribunal_nom')
            ->add('autorite_id')
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
