<?php

namespace App\Form;

use App\Entity\Stagiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite_id')
            ->add('nom')
            ->add('nom_naissance')
            ->add('prenom')
            ->add('date_naissance')
            ->add('lieu_naissance', TextType::class, array(
                'label'=> 'Lieu de naissance',
            ) 
            )
            ->add('adresse')
            ->add('code_postal')
            ->add('commune')
            ->add('pays')
            ->add('tel_portable')
            ->add('tel_fixe')
            ->add('email')
            ->add('carte_avantages_jeunes')
            ->add('partenaires')
            ->add('adherents')
            ->add('permis')
            ->add('liaisonStagiaireStageDossierCasBordereau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
