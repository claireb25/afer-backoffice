<?php

namespace App\Form;

use App\Entity\Permis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Stagiaire;
use App\Entity\Prefecture;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class PermisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('stagiaire_id', EntityType::class, array(
                'class' => Stagiaire::class,
                'label'=> 'Stagiaires ',)
            )
            ->add('numero_permis', TextType::class, array(
                'label'=> 'Numéro de permis ',)
            )
            ->add('delivre_le', DateType::class, array(
                'label'=> 'Délivré le ',)
            )
            ->add('prefecture_id', EntityType::class, array(
                'class' => Prefecture::class,
                'label'=> 'Préfecture ',)
            ) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Permis::class,
        ]);
    }
}
