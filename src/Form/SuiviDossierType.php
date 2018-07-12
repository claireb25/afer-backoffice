<?php

namespace App\Form;

use App\Entity\SuiviDossier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuiviDossierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paye')
            ->add('reception_bulletin_inscription')
            ->add('copie_cni')
            ->add('copie_permis')
            ->add('releve_integral')
            ->add('decision_judiciaire')
            ->add('lettre_48n')
            ->add('observations')
            ->add('inscription_envoye_par_id')
            ->add('convoc_envoye_par_id')
            ->add('liaisonStagiaireStageDossierCasBordereau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SuiviDossier::class,
        ]);
    }
}
