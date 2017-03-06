<?php

namespace DietpackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MealType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('calorific')
                ->add('ingredients', EntityType::class, array(
                            'class' => 'DietpackBundle:Ingredient',
                            'query_builder' => function(EntityRepository $er){
                                return $er->createQueryBuilder('u')
                                            ->orderBy('u.name', 'ASC');
                            },
                            'expanded' => true,
                            'multiple' => true
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DietpackBundle\Entity\Meal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dietpackbundle_meal';
    }


}
