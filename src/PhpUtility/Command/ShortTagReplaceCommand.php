<?php

namespace PhpUtility\Command;

use PhpUtility\Console\Command;

class ShortTagReplaceCommand extends Command
{
    protected function configure()
    {
        $this->setName('utility:short-tag:replace')
            ->setDescription('Searches for all instances of <?, <?=, <%, <%= and replaces them with <?php or <?php echo');
    }
}
