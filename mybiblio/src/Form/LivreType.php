<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Lecteur;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', EmailType::class, [
                'label'=> 'email',
                'required' => false,
                'attr'=>[
                    'placeholder' => 'nom@email.com'
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
                'label' => 'Genre',
                'required' => false,
            ])
            ->add('lecteur', EntityType::class,[
                'label' => 'Lecteur', 
                'class'=> Lecteur::class,
                'choice_label'=> function (Lecteur $lecteur) {
                    return $lecteur->getNom() . ' ' . $lecteur->getPrenom();
            },
                'required' => false
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
