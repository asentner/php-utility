<?php

namespace PhpUtility\Command;

use PhpUtility\Console\Command;

class ShortArrayConverterCommand extends Command
{
    protected function configure()
    {
        $this->setName('utility:array:converter')
            ->setDescription('Converts all array() to the new short format []');
    }
}
