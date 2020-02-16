<?php

namespace App\Form;

use App\Entity\Lecteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label'=> 'Nom du lecteur',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez un nom'
                ]
            ])
            ->add('prenom', TextType::class,[
                'label'=>'Prénom du lecteur',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Entrez un prénom'
                ]
            ])
            ->add('adresse', TextType::class,[
                'label'=>'Adresse du lecteur',
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Entrez une adresse'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lecteur::class,
        ]);
    }
}
