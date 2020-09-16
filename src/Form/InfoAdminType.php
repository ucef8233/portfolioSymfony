<?php

namespace App\Form;

use App\Entity\InfoAdmin;
use Symfony\Component\Form\{FormBuilderInterface, AbstractType};
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class InfoAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('titre', TextType::class)
            ->add('mail')
            ->add('adress');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoAdmin::class,
        ]);
    }
}
