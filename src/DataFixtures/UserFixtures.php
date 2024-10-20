<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setBridgeApiUUID('99a37927-eae2-48fc-88b1-480d12c71368');
        $user->setCivility('Mr');
        $user->setFirstName('remy');
        $user->setLastName('enot');
        $user->setUsername('darko');
        $user->setEmail('re@my-domain.it');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setVerified(true);
        $user->setLocale('fr');
        $user->setSubscription($this->getReference('subscription-1'));
        $user->setIsSubscriptionActivate(true);

        $password = $this->hasher->hashPassword($user, 'tototo');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setCivility('Mr');
        $user->setFirstName('jean');
        $user->setLastName('dumont');
        $user->setUsername('toto');
        $user->setEmail('jean@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setVerified(true);
        $user->setLocale('fr');
        $user->setSubscription($this->getReference('subscription-2'));
        $user->setIsSubscriptionActivate(false);

        $password = $this->hasher->hashPassword($user, 'tototo');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setCivility('Mme');
        $user->setFirstName('delphine');
        $user->setLastName('yau');
        $user->setUsername('toto');
        $user->setEmail('delphine@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setVerified(true);
        $user->setLocale('fr');
        $user->setSubscription($this->getReference('subscription-3'));
        $user->setIsSubscriptionActivate(false);

        $password = $this->hasher->hashPassword($user, 'tototo');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setCivility('Mme');
        $user->setFirstName('julie');
        $user->setLastName('florite');
        $user->setUsername('toto');
        $user->setEmail('julie@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $user->setVerified(true);
        $user->setLocale('fr');
        $user->setSubscription($this->getReference('subscription-4'));
        $user->setIsSubscriptionActivate(false);

        $password = $this->hasher->hashPassword($user, 'tototo');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SubscriptionFixtures::class,
        ];
    }
}
