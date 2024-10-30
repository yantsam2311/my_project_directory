<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MessageType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Message;
use Symfony\Component\Notifier\Exception\UnsupportedMessageTypeException; 
use Symfony\Component\Validator\Constraints as Assert;

class SignUpForm extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('POST');
        $builder->setAttributes(['class' => "MonId"]);

        $builder
            ->add(
                'email',
                EmailType::class,
                ['attr' => ['placeholder' => 'Entrez vôtre email'], "constraints" => [
                    new Assert\Email(['message'=> 'Email invalide!'])
                ]]
                )

                ->add(
                    'message',
                Message::class,
                    ["label" => "message", 'attr' => ['placeholder' => 'Entrez vôtre message'],
                    "constraints" => [
                        new Assert\NotBlank(['message'=> 'message obligatoire']),
                     
                    ]]
                )

            ->add(
                    'Envoyer',
                    SubmitType::class,
                    ["attr" => ['class' => "button"]]
                );
     }
  }