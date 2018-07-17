<?php

namespace App\Form;

use App\Entity\ForfaitAnimateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
class ForfaitAnimateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('forfait_prix', IntegerType::class, array(
                'label'=> 'Forfait (€)',)
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ForfaitAnimateur::class,
        ]);
    }
}
