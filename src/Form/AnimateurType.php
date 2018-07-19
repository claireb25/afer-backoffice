<?php

namespace App\Form;

use App\Entity\Animateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('gta')
            ->add('raison_sociale')
            ->add('adresse')
            ->add('code_postal')
            ->add('commune')
            ->add('region')
            ->add('tel_portable')
            ->add('tel_fixe')
            ->add('email')
            ->add('urssaf')
            ->add('siret')
            ->add('civilite_id')
            ->add('fonction_animateur_id')
            ->add('statut_id')
            ->add('forfait_animateur_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animateur::class,
        ]);
    }
}
