<?php

namespace Picweek\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * User bundle
 *
 * @author Philippe Gibert <philippe.gibert@gmail.com>
 * @since  0.1
 */
class PicweekUserBundle extends Bundle
{

    /**
     * (non-PHPdoc)
     * @see Symfony\Component\HttpKernel\Bundle.Bundle::getParent()
     *
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
