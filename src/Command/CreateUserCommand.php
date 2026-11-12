<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(name: 'app:create-user', description: 'Create a user with a given role')]
class CreateUserCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $em,
        private UserPasswordHasherInterface $hasher,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED)
            ->addArgument('password', InputArgument::REQUIRED)
            ->addArgument('role', InputArgument::OPTIONAL, 'ROLE_USER or ROLE_EMPLOYEE', 'ROLE_USER');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $role = $input->getArgument('role');

        if (!in_array($role, ['ROLE_USER', 'ROLE_EMPLOYEE'], true)) {
            $io->error('Role must be ROLE_USER or ROLE_EMPLOYEE.');
            return Command::FAILURE;
        }

        $user = new User();
        $user->setEmail($input->getArgument('email'));
        $user->setRoles([$role]);
        $user->setPassword(
            $this->hasher->hashPassword($user, $input->getArgument('password'))
        );

        $this->em->persist($user);
        $this->em->flush();

        $io->success("Created {$user->getEmail()} with $role");
        return Command::SUCCESS;
    }
}