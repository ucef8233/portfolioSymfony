<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\{TextareaType, EmailType, TextType};
use Symfony\Component\Form\{FormBuilderInterface, AbstractType};
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', TextType::class, ['label'  => false,])
      ->add('phone', TextType::class, ['label'  => false,])
      ->add('email', EmailType::class, ['label'  => false,])
      ->add('message', TextareaType::class, ['label'  => false,]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Contact::class
    ]);
  }
}
