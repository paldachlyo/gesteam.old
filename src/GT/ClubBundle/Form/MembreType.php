<?php

namespace GT\ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MembreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('nom', 
				TextType::class,
				array('label' => 'gt.membre.form.label.nom'))
			->add('prenom', 
				TextType::class,
				array('label' => 'gt.membre.form.label.prenom'))
			->add('email', 
				EmailType::class,
				array('label' => 'gt.membre.form.label.email'))
			->add('telephone', 
				TextType::class,
				array('label' => 'gt.membre.form.label.telephone'))
			->add('dateNaissance', 
				DateType::class,
				array('label' => 'gt.membre.form.label.date_naissance'))
			->add('emailParent1', 
				EmailType::class,
				array(
					'label' => 'gt.membre.form.label.email_parent1',
					'required' => false))
			->add('emailParent2', 
				EmailType::class,
				array(
					'label' => 'gt.membre.form.label.email_parent2',
					'required' => false))
			->add('pseudo', 
				TextType::class,
				array(
					'label' => 'gt.membre.form.label.pseudo',
					'required' => false))
			->add('taille', 
				TextType::class,
				array(
					'label' => 'gt.membre.form.label.taille',
					'required' => false))
			->add('poids', 
				TextType::class,
				array(
					'label' => 'gt.membre.form.label.poids',
					'required' => false))
			->add('creer', SubmitType::class, 
				array('label' => 'gt.membre.form.label.creer'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GT\ClubBundle\Entity\Membre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gt_clubbundle_membre';
    }


}
