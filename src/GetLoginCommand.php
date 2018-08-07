<?php

    namespace iroms;

    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Output\OutputInterface;
    use iroms\getLogin;

    class GetLoginCommand extends Command
    {
        public function configure()
        {
            $this->setName("getLogin")
                 ->setDescription("There are getLogin")
                 ->addArgument('name', InputArgument::REQUIRED, 'name')
                 ->addArgument('surname', InputArgument::REQUIRED, 'surname')
                 ->addArgument('maxLength', InputArgument::OPTIONAL, 'maximum length');
        }

        protected function execute (InputInterface $input, OutputInterface $output)
        {
            $name    = $input->getArgument('name');
            $surname = $input->getArgument('surname');

            $maxLength = $input->getArgument('maxLength');

            $proc = new getLogin();

            if (!$maxLength)
            {
                $res = $proc->getLogin($name, $surname);
            }
            else
            {
                $res = $proc->getLogin($name, $surname, $maxLength);
            }

            $output->writeln($res);
        }

    }