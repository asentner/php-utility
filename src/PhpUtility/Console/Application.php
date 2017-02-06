<?php

namespace PhpUtility\Console;

use PhpUtility\PhpUtility;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends BaseApplication
{
    /**
     * @var string
     */
    protected $configRoot;

    /**
     * @var string
     */
    protected $configPath;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('America/New_York');
        }

        parent::__construct(PhpUtility::NAME, PhpUtility::VERSION);
    }

    /**
     * {@inheritDoc}
     */
    final protected function getDefaultCommands()
    {
        // Load the default commands into the array
        $commands = parent::getDefaultCommands();

        // Instantiate all classes from the Coalmarch\Command namespace
        $allFiles = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(__DIR__ . '/../Command'));
        $phpFiles = new \RegexIterator($allFiles, '/\.php$/');

        foreach ($phpFiles as $phpFile) {
            $code = file_get_contents($phpFile->getRealPath());
            $tokens = token_get_all($code);
            $namespace = '';
            for ($index = 0; isset($tokens[$index]); $index++) {
                if (!isset($tokens[$index][0])) {
                    continue;
                }
                if (T_NAMESPACE === $tokens[$index][0]) {
                    $index += 2; // Skip namespace keyword and whitespace
                    while (isset($tokens[$index]) && is_array($tokens[$index])) {
                        $namespace .= $tokens[$index++][1];
                    }
                }
                if (T_CLASS === $tokens[$index][0]) {
                    $index += 2; // Skip class keyword and whitespace
                    $commandClass = new \ReflectionClass($namespace . '\\' . $tokens[$index][1]);
                    $commands[] = $commandClass->newInstance();
                }
            }
        }

        return $commands;
    }

    /**
     * {@inheritDoc}
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        return parent::run($input, $output);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultInputDefinition()
    {
        $definition = parent::getDefaultInputDefinition();
        $definition->addOption(new InputOption('--working-dir', '-d', InputOption::VALUE_REQUIRED, 'If specified, use the given directory as working directory.'));
        return $definition;
    }
}
