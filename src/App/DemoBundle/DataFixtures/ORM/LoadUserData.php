<?php

namespace App\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\DemoBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('test');
        $user->setEmail('test@example.com');
        $user->setPassword('testpassword');
        $manager->persist($user);
        
        $manager->flush();
    }
}