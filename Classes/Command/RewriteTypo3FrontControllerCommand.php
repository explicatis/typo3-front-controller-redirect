<?php declare(strict_types=1);

namespace Explicatis\Typo3FrontControllerRedirect\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RewriteTypo3FrontControllerCommand extends Command
{
    protected function configure(): void
    {
        $this->setDescription('Changes TYPO3 front controller to reroute backend calls');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->write('Writing changed front controller ... ');
        try {
            copy(__DIR__ . '/../../new_index.php', 'public/index.php');
        } catch (\Throwable $throwable) {
            $io->error('Error occured: ' . $throwable->getMessage());
        }
        $output->writeln('done');
        return 0;
    }
}
