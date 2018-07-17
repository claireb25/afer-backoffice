<?php

namespace App\Form;

use App\Entity\Tribunal;
use App\Entity\AutoriteTribunal;
use App\Entity\NatureTribunal;
use App\Entity\ServiceTribunal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class Tribunal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tribunal_nom',  TextType::class, array(
                'label'=> 'Nom du tribunal',)
            )
            ->add('nature_tribunal_id', EntityType::class, array(
                'class' => NatureTribunal::class,
                'choice_label' => 'nature_nom',
                'label'=> 'Nature',
                'placeholder' => 'sélectionnez une nature de tribunal',)
            )
            ->add('service_tribunal_id', EntityType::class, array(
                'class' => ServiceTribunal::class,
                'choice_label'=>'service_nom',
                'label'=> 'Service',
                'placeholder' => 'sélectionnez un service',)
            )
            ->add('autorite_tribunal_id', EntityType::class, array(
                'class' => AutoriteTribunal::class,
                'choice_label' => 'autorite_nom',
                'label' => 'Autorité',
                'placeholder' => 'sélectionnez une autorité',
            ))
            ->add('adresse', TextType::class, array(
                'label'=> 'Adresse',)
            )
            ->add('code_postal', TextType::class, array(
                'label'=> 'Code postal',)
                )
            ->add('commune', TextType::class, array(
                'label'=> 'Ville',)
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tribunal::class,
        ]);
    }
}
