<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{TextType, FileType};
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
                // 'delete_label' => 'supprimer',
                'download_label' => 'telecharger',
                'download_uri' => false,
                'image_uri' => true,
                // 'imagine_pattern' => '...',
                'asset_helper' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
