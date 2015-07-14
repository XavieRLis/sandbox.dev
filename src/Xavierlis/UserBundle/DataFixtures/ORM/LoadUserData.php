<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 14.07.2015
 * Time: 21:48
 */

namespace Xavielis\UserBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Xavierlis\UserBundle\Entity\User;


class LoadUserData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->setPlainPassword('admin');
        $userAdmin->setEnabled(true);
        $userAdmin->addRole('ROLE_SUPER_ADMIN');

        $manager->persist($userAdmin);
        $manager->flush();
    }
}