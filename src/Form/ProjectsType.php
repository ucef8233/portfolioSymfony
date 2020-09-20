<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\{FormBuilderInterface, AbstractType};
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('lien', TextType::class)
            ->add('description')
            ->add('imageFile', VichImageType::class, [
                'required' => true,
                'allow_delete' => true,
                'label' => 'ImageFile',
                'download_uri' => false,
                // "attr" => ['class' => "form-control-file"],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
