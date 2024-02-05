<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('image', FileType::class, [
                "data_class" => null,
                "required" =>false
                // 'attr' => [
                //     'accept' => "image/*"
                // ],
                // 'constraints' => [
                //     new Image()
                // ]
            ])
            // ->add('image')
            ->add('lieu')
            ->add('description')
            ->add('prix', NumberType::class)
            ->add('dateEvenement')
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
