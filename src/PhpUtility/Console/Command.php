<?php

namespace PhpUtility\Console;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand
{
    /**
     * Command constructor.
     * @param null|string $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
    }

    /**
     * @return \Symfony\Component\Console\Application
     */
    public function getApplication()
    {
        return parent::getApplication();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        return parent::run($input, $output);
    }
}
