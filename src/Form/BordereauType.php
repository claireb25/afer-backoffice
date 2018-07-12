<?php

namespace App\Form;

use App\Entity\Bordereau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prefecture_id')
            ->add('tribunal_id')
            ->add('liaisonStagiaireStageDossierCasBordereau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bordereau::class,
        ]);
    }
}
