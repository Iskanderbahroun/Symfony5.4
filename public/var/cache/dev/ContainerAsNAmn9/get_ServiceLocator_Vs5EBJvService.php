<?php

namespace ContainerAsNAmn9;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Vs5EBJvService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Vs5EBJv' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Vs5EBJv'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'authorrepo' => ['privates', 'App\\Repository\\AuthorRepository', 'getAuthorRepositoryService', true],
        ], [
            'authorrepo' => 'App\\Repository\\AuthorRepository',
        ]);
    }
}
