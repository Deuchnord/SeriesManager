<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EpisodeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {	
        $builder->add('season', null, [
        		'label' => "Season number",
        		'attr' => ['min' => 1]
        ])->add('episodeNumber', null, [
        		'attr' => ['min' => 1]
        ])->add('name', null, [
        		'label' => "Episode title",
        		'attr' => ['autofocus' => true] 
        ])->add('datePublished', DateType::class, [
        		'widget' => 'single_text',
        		'html5' => false,
        		'attr' => ['class' => 'datepicker']
        ])->add('description', TextareaType::class, [
        		'attr' => ['class' => 'materialize-textarea']
        ])->add('image', UrlType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Episode',
        	'season' => 1,
        	'episode' => 1
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_episode';
    }


}
