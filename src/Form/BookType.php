<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('title')
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Science-Fiction' => 'Science-Fiction',
                    'Mystery' => 'Mystery',
                    'Autobiography' => 'Autobiography',
                ],
            ])
            
            ->add('publicationDate', DateType::class, [
                'widget' => 'single_text', // Afficher en tant qu'entrée texte unique
                'format' => 'yyyy-MM-dd', // Définir le format de date souhaité
            ])
            ->add('published')
            ->add('author', EntityType::class, [
                'class' => Author::class, // Utilisez le nom complet de la classe Author
                'choice_label' => 'userName', // Utilisez la propriété 'username' de l'entité Author
                'multiple' => false,
                'expanded' => false,
                'required' => false,
                'placeholder' => 'Select an author'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}