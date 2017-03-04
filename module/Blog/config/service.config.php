<?php

namespace Blog;

return [
  'invokables' => [
    'Blog\Repository\PostRepository' => 'Blog\Repository\PostRepositoryImpl'
  ],
  'factories' => [
    'Blog\Service\BlogService' => function(\Zend\ServiceManager\ServiceManager $sm) {
        $blogService = new \Blog\Service\BlogServiceImpl();
        $blogService->setPostRepository($sm->get('Blog\Repository\PostRepository'));

        return $blogService;
    }
  ],
  'initializers' => [
    function (\Zend\ServiceManager\ServiceManager $sm, $instance) {
      if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
        $instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
      }
    }
  ]
];
