<?php

namespace Blog\Controller;

use Interop\Container\ContainerInterface;

class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new IndexController($container->get('Zend\Db\Adapter\Adapter'));
    }
}
