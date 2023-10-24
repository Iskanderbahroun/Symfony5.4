<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('views')
            
            ->add('category', EntityType::class, [
                'class' => Category::class, // Utilisez le nom complet de la classe Author
                'choice_label' => 'name', // Utilisez la propriété 'username' de l'entité Author
                'multiple' => false,
                'expanded' => false,
                'required' => false,
                'placeholder' => 'Select an category'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
