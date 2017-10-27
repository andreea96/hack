<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/27/2017
 * Time: 10:49 AM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class InfoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('industrie',null,[
                'constraints' => array(
                    new NotBlank(['message' => 'Introduceti industria din care faceti parte']))])

            ->add('email',null,[
                'constraints' => array(
                    new NotBlank(array('message' => 'Introduceti mail')),
                    new Email(array('message' => 'Email invalid')))])
            ->add('trafic',null, [
                'constraints' => array(
                    new NotBlank(array('message' => 'Introduceti traficul')))])


            ->add('volum_cos',null,[
                'constraints' => array(
                    new NotBlank(array('message' => 'Introduceti volum mediu/cos')))]);



    }
}