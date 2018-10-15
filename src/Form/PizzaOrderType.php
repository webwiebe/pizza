<?php

namespace App\Form;

use App\Entity\Business;
use App\Entity\PizzaOrder;
use App\Entity\UpdatePreference;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('business', EntityType::class, [
                'class'    => Business::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('pizza', PizzaType::class, [
                'label' => false,
            ])
            ->add('updatePreference', EntityType::class, [
                'class' => UpdatePreference::class
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Order',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PizzaOrder::class,
        ]);
    }
}
