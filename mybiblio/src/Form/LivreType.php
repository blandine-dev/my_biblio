<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Lecteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label'=> 'Titre du livre',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'Entrez un titre!'
                ]
            ])
            ->add('datepret', DateType::class, [
                'label'=> 'Date de prêt',
                'years'=> ['2020','2021'],
                'format'=> 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
            ])
            ->add('dateretour', DateType::class, [
                'label'=> 'Date de retour',
                'years'=> ['2020','2021'],
                'format'=> 'dd MM yyyy',
                'data' => new \DateTime('now', new \DateTimeZone('Europe/Paris'))
            ])
            ->add('genre', EntityType::class,[
                'class'=> Genre::class,
                'choice_label'=> 'name',
                'label' => 'Genre'
            ])
            ->add('lecteur', EntityType::class,[
                'label'=> 'Lecteur',
                'class'=> Lecteur::class,
                'choice_label'=> 'nom',
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
