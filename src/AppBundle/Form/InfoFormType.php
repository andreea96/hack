<?php
/**
 * Created by PhpStorm.
 * User: andreea.olaru
 * Date: 10/27/2017
 * Time: 10:49 AM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Industry;
use AppBundle\Entity\Subindustry;
use AppBundle\Entity\URL;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\UrlValidator;

class InfoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('industrie',EntityType::class,[
                'attr'=>['placeholder'=>'Industrie'],

                'class'=> Subindustry::class,
                'query_builder'=>function(EntityRepository $repository){

                    return $repository->createQueryBuilder('subindustrie')->orderBy('subindustrie.name','asc');

                },
                'constraints' => array(
                    new NotBlank(['message' => 'Introduceti industria din care faceti parte'])),
            'group_by'=>function(Subindustry $subindustrie,$key,$index)
                {
                    return $subindustrie->getIndustry()->getName();
                }
            ])

            ->add('site',TextType::class,[
                    'constraints'=>[new NotBlank(['message'=> 'Ne trebuie url-ul site-ului tau']),
                    //new UrlValidator()
                    ]
                ]);

    }
}