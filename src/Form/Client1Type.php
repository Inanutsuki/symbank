<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Credit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Client1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateDeNaissance')
            ->add('adresse')
            ->add('codePostal')
            ->add('telephone')
            ->add('statutMarital')
            // ->add('credit', EntityType::class, [
            //     "class" => Credit::class
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
