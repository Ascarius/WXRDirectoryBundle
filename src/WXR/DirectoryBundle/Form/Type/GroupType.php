<?php

namespace WXR\DirectoryBundle\Form\Type;

use WXR\CategoryBundle\Form\Type\CategoryType;

class GroupType extends CategoryType
{
    public function getName()
    {
        return 'group';
    }

}
