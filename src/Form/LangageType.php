<?php

namespace App\Form;

use App\Entity\InfoAdmin;
use App\Entity\Langage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LangageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('langage')
            ->add(
                'admin',
                EntityType::class,
                [
                    'class' => InfoAdmin::class,
                    'choice_label' => 'nom',
                ]
            );;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Langage::class,
        ]);
    }
}
