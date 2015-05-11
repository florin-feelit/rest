<?php

namespace App\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\DemoBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(OjectManager $manager)
    {
        $thomas = new User();
        $thomas->setUsername('thomas');
        $thomas->setPassword('foothomaspassword');
        $thomas->setEmail('thomas@example.com');
        
        $jerome = new User();
        $jerome->setUsername('jerome');
        $jerome->setPassword('foojeromepassword');
        $jerome->setEmail('jerome@example.com');
        $manager->persist($thomas);
        $manager->persist($jerome);
        $manager->flush();
    }
}