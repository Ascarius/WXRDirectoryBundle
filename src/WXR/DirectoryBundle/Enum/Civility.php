<?php

namespace WXR\DirectoryBundle\Enum;

class Civility
{
    const MISSTRESS = 'civility.misstress';
    const MISTER    = 'civility.mister';
    const DOCTOR    = 'civility.doctor';
    const PROFESSOR = 'civility.professor';
    const MASTER    = 'civility.master';

    public static function getList()
    {
        return array(
            static::MISSTRESS => static::MISSTRESS,
            static::MISTER    => static::MISTER,
            static::DOCTOR    => static::DOCTOR,
            static::PROFESSOR => static::PROFESSOR,
            static::MASTER    => static::MASTER
        );
    }
}
