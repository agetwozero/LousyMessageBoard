<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 4-4-17
 * Time: 11:10
 */

namespace FrozenAuth\Controller\Factory;


use FrozenAuth\Controller\AuthController;
use FrozenAuth\Service\AuthManager;
use FrozenAuth\Service\UserManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);
        $userManager = $container->get(UserManager::class);

        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new AuthController($entityManager, $authManager, $authService, $userManager);
    }

}