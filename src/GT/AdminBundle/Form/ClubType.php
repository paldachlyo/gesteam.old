<?php

namespace GT\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('nom', TextType::class, 
				array('label' => 'gt.admin.club.form.label.nom'))
			->add('email', EmailType::class, 
				array('label' => 'gt.admin.club.form.label.email'))
			->add('telephone', TextType::class, 
				array(
					'label' => 'gt.admin.club.form.label.telephone', 
					'required' => false))
			->add('submit', SubmitType::class, 
				array('label' => 'gt.admin.club.form.label.ajouter'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GT\ClubBundle\Entity\Club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gt_adminbundle_club';
    }


}
