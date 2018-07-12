<?php

namespace App\Form;

use App\Entity\Infraction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfractionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_infraction')
            ->add('heure_infraction')
            ->add('lieu_infraction')
            ->add('numero_parquet')
            ->add('conduite_sans_permis')
            ->add('conduite_sans_assurance')
            ->add('type_infraction_id')
            ->add('tribunal_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Infraction::class,
        ]);
    }
}
