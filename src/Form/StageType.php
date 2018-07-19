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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stage_numero', TextType::class, array(
                'label'=> 'Numéro de stage',
            ))
            ->add('date', DateType::class,
            array(  'label' => 'Date',
                    'widget' => 'choice',
                    'format' => 'dd-MMMM-yyyy'
                    
            ,))
            ->add('stage_hpo', CheckboxType::class, array(
                'label'=>'Stage hors programme officiel',
                'required'=> false
            ))
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
