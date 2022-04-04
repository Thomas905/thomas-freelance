<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => "form-control"
                ],
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => "form-control"
                ],
            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => 'Adresse mail',
                    'class' => "form-control"
                ],
            ])
            ->add('titleMessage', TextType::class, [
                'attr' => [
                    'placeholder' => 'Titre du message',
                    'class' => "form-control"
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Votre message',
                    'class' => "form-control-textarea"
                ],
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entreprise',
                    'class' => "form-control"
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}