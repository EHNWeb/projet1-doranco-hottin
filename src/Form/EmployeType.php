<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('telephone', null , [
                'help' => 'Les chiffres peuvent être séparés par un espace, un point ou un tiret'
            ])
            ->add('email')
            ->add('adresse')
            ->add('poste')
            ->add('salaire', null , [
                'help' => 'Le salaire doit être un entier supérieur ou égale à 0'
            ])
            ->add('datedenaissance',DateType::Class, array(
                'widget' => 'choice',
                'years' => range(date('Y')-70, date('Y')-14),
                'format' => 'dd-MM-yyyy',
              ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
