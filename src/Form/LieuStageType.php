<?php

namespace App\Form;

use App\Entity\LieuStage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LieuStageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lieu_nom', TextType::class,
            array ( 'label' => 'Nom du lieu'
            ,))
            ->add('etablissement_nom', TextType::class,
            array ( 'label' => 'Nom de l\'établissement'
            ,))
            ->add('adresse')
            ->add('code_postal')
            ->add('commune')
            ->add('tel')
            ->add('latitude')
            ->add('longitude')
            ->add('divers', TextType::class,
            array('label'=>'Observation'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LieuStage::class,
        ]);
    }
}
