<?php

namespace App\Form;

use App\Entity\Stage;
use App\Entity\LieuStage;
use App\Entity\Animateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stage_numero', TextType::class, array(
                'label'=> 'Numéro de satge',
            ))
            ->add('date')
            ->add('stage_hpo')
            ->add('lieu_stage_id', EntityType::class, array(
                'class'=> LieuStage::class,
                'label'=>'Lieu de stage'
            ))
            ->add('animateurs')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
