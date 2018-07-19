<?php

namespace App\Form;

use App\Entity\Stagiaire;
use App\Entity\Civilite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civilite_id', EntityType::class,
            array(  'class' => Civilite::class,
                    'label' => 'Civilité'
            ,))
            ->add('nom')
            ->add('nom_naissance', TextType::class,
            array ( 'label' => 'Nom de naissance'
            ,))
            ->add('prenom', TextType::class,
            array ( 'label' => 'Prénom'
            ,))
            ->add('date_naissance', DateType::class,
            array(  'label' => 'Date de naissance',
                    'widget' => 'choice',
                    'years' => range(date('Y'), date('Y')-100),
                    'format' => 'dd-MMMM-yyyy'
                    
            ,))
            ->add('lieu_naissance', TextType::class,
            array ( 'label' => 'Ville de naissance'
            ,))
            ->add('adresse')
            ->add('code_postal')
            ->add('commune', TextType::class,
            array ( 'label' => 'Ville'
            ,))
            ->add('pays') // deux possibilités : 1/créer un entitype est connecter à une nouvelle table pays via un namespace 2/ utiliser une api qui gère ville pays données gps
            ->add('tel_portable')
            ->add('tel_fixe')
            ->add('email')
            ->add('carte_avantages_jeunes')
            ->add('partenaires')
            ->add('adherents', CheckboxType::class,
            array ( 'label' => 'Adhérents',
             'required'=>false 
            ))
            ->add('permis')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
