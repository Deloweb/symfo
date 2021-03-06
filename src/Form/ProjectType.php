<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('students', EntityType::class, [
                // looks for choices from this entity
                'class' => Student::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => function ($student) {
                    return $student->getFirstname() . ' ' . $student->getLastname();
                },
            
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
