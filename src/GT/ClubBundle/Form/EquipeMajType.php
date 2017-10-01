<?php

namespace GT\ClubBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeMajType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->remove('submit');
		
		$builder->add('submit', SubmitType::class, array('label' => 'gt.equipe.form.label.modifier'));
    }
	
	public function getParent() {
		return EquipeType::class;
	}
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gt_clubbundle_equipe_maj';
    }


}
