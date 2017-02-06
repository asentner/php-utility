<?php

namespace PhpUtility;

class PhpUtility
{
    const NAME = 'PHP Utilities';
    const VERSION = '1.0.0';
    const VERSION_ID = '10000';
    const MAJOR_VERSION = '1';
    const MINOR_VERSION = '0';
    const RELEASE_VERSION = '0';
    const EXTRA_VERSION = '';
    /**
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }
    /**
     * @return string
     */
    public function getVersion()
    {
        return static::VERSION;
    }
    /**
     * @return string
     */
    public function getLongVersion()
    {
        $version = static::MAJOR_VERSION . '.' . static::MINOR_VERSION . '.' . static::RELEASE_VERSION;
        if (static::EXTRA_VERSION != '') {
            $version .= '-' . static::EXTRA_VERSION;
        }
        return $version;
    }
}
