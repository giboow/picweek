<?php
namespace Picweek\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

/**
 * Picweek\Bundle\UserBundle\Form\Type\RegistrationFormType
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class RegistrationFormType extends BaseType
{


    /**
     * Build form
     * @param FormBuilder   $builder
     * @param array         $options
     *
     * @see FOS\UserBundle\Form\Type.RegistrationFormType::buildForm()
     *
     * @return void
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('location', null, array('required' => false));
    }

    /**
     * Get name
     * @see FOS\UserBundle\Form\Type.RegistrationFormType::getName()
     *
     * @return string
     */
    public function getName()
    {
        return 'picweek_user_registration';
    }
}
