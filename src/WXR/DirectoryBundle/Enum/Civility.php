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
            static::MISSTRESS => 'wxr_directory.civility.misstress',
            static::MISTER    => 'wxr_directory.civility.mister',
            static::DOCTOR    => 'wxr_directory.civility.doctor',
            static::PROFESSOR => 'wxr_directory.civility.professor',
            static::MASTER    => 'wxr_directory.civility.master'
        );
    }
}
