<?php

namespace Picweek\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Picweek/Bundle/UserBundle/User
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class UserType extends AbstractType
{

    /**
     * Build form
     * @param FormBuilder   $builder
     * @param array         $options
     *
     * @see Symfony\Component\Form.AbstractType::buildForm()
     *
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt');
    }

    /**
     * @see Symfony\Component\Form.FormTypeInterface::getName()
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return 'picweek_bundle_userbundle_usertype';
    }
}
