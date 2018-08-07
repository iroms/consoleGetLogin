<?php

    namespace iroms;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Output\OutputInterface;
    use iroms\Sum;

    class SumCommand extends Command
    {
        public function configure()
        {
            $this->setName("sum")
                 ->setDescription("There are sum")
                 ->addArgument('a', InputArgument::REQUIRED, 'first number')
                 ->addArgument('b', InputArgument::REQUIRED, 'second number');
        }

        protected function execute (InputInterface $input, OutputInterface $output)
        {
            $a = $input->getArgument('a');
            $b = $input->getArgument('b');

            $sum = new Sum();
            $res = $sum->sum($a, $b);
            //$s = $a + $b;
            //$output->writeln("$a + $b = $s");
            $output->writeln($res);
        }

    }