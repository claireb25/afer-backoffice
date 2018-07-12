<?php

namespace App\Form;

use App\Entity\CasStage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CasStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cas_nom')
            ->add('cas_prix')
            ->add('liaisonStagiaireStageDossierCasBordereau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CasStage::class,
        ]);
    }
}
