<?php

namespace App\Form;

use App\Entity\{Softskill, InfoAdmin};
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SoftskillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('softskill')
            ->add(
                'admin',
                EntityType::class,
                [
                    'class' => InfoAdmin::class,
                    'choice_label' => 'nom',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Softskill::class,
        ]);
    }
}
