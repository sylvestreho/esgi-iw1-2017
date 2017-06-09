<?php

namespace Blog\Controller;

use Interop\Container\ContainerInterface;

class BlogPostControllerFactory
{
  public function __invoke(ContainerInterface $container)
  {
    return new BlogPostController(
      $container->get('Blog\Service\BlogService')
    );
  }
}
