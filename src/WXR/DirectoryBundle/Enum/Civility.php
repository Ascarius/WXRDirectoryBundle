<?php

namespace WXR\DirectoryBundle\Enum;

class Civility
{
    const MISSTRESS = 'misstress';
    const MISTER    = 'mister';
    const DOCTOR    = 'doctor';
    const PROFESSOR = 'professor';
    const MASTER    = 'master';

    public static function getList()
    {
        return array(
            static::MISSTRESS => 'civility.misstress',
            static::MISTER    => 'civility.mister',
            static::DOCTOR    => 'civility.doctor',
            static::PROFESSOR => 'civility.professor',
            static::MASTER    => 'civility.master'
        );
    }
}
