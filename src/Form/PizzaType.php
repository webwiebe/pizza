<?php

namespace App\Form;

use App\Entity\Pizza;
use App\Entity\PizzaBottom;
use App\Entity\PizzaTopping;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bottom', EntityType::class, [
                'class'    => PizzaBottom::class,
                'multiple' => false,
                'expanded' => false
            ])
            ->add('topping', EntityType::class, [
                'class'    => PizzaTopping::class,
                'multiple' => false,
                'expanded' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}