<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/27/2017
 * Time: 9:21 PM
 */

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserInfoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>'AppBundle\Entity\User'
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class ,[
                'attr'=>['placeholder' => 'andrei@zitec.com'],
                'constraints'=>[
                    new NotBlank(),
                    new Email()
                ]
            ])
            ->add('name',TextType::class,[
                'attr' => ['placeholder' => 'Andrei Dobre'],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('phone',TextType::class,[
                'attr'=> ['placeholder' => '0720653769'],
                'constraints'=> [
                    new Regex(['pattern'=>'/^[0-9-\s]*$/'])
                ]
            ]);
    }
}