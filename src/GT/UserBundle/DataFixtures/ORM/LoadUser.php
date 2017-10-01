<?php
// src/GT/UserBundle/DataFixtures/ORM/LoadUser.php

namespace GT\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GT\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
	public function load(ObjectManager $manager) {
	
		$user = new User();
		$user->setUsername('ami');
		$user->setPassword('ami');
		$user->setEmail('ami@gmail.com');
		$user->setRoles(array('ROLE_AMI');
		$manager->persist($user);
		
		$user1 = new User();
		$user1->setUsername('joueur');
		$user1->setPassword('joueur');
		$user1->setEmail('joueur@gmail.com');
		$user1->setRoles(array('ROLE_JOUEUR');
		$manager->persist($user1);
		
		$user2 = new User();
		$user2->setUsername('coach');
		$user2->setPassword('coach');
		$user2->setEmail('coach@gmail.com');
		$user2->setRoles(array('ROLE_JOUEUR', 'ROLE_COACH');
		$manager->persist($user2);
		
		$user3 = new User();
		$user3->setUsername('admin');
		$user3->setPassword('admin');
		$user3->setEmail('admin@gmail.com');
		$user3->setRoles(array('ROLE_ADMIN');
		$manager->persist($user3);

		$manager->flush();
	}
}