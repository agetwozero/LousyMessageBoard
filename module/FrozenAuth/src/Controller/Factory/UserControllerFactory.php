<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 4-4-17
 * Time: 11:10
 */

namespace FrozenAuth\Controller\Factory;


use FrozenAuth\Controller\UserController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new UserController($entityManager);
    }

}