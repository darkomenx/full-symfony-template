<?php

namespace App\DataFixtures;

use App\Entity\Subscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubscriptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $subscription = new Subscription();
        $subscription->setName('free');
        $subscription->setDescription('cest la version la plus simple et gratuit');
        $subscription->setPrice(0);

        $this->addReference('subscription-1', $subscription);

        $manager->persist($subscription);
        $manager->flush();

        $subscription = new Subscription();
        $subscription->setName('support');
        $subscription->setDescription('version simple avec soutient financier');
        $subscription->setPrice(5);

        $this->addReference('subscription-2', $subscription);

        $manager->persist($subscription);
        $manager->flush();

        $subscription = new Subscription();
        $subscription->setName('full');
        $subscription->setDescription('Le produit complet pour les particuliers');
        $subscription->setPrice(10);

        $this->addReference('subscription-3', $subscription);

        $manager->persist($subscription);
        $manager->flush();

        $subscription = new Subscription();
        $subscription->setName('expert');
        $subscription->setDescription('pour les experts de la finance');
        $subscription->setPrice(20);

        $this->addReference('subscription-4', $subscription);

        $manager->persist($subscription);
        $manager->flush();
    }
}
