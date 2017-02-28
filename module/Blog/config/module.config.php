<?php

namespace Blog;

return [
  'controllers' => [
    'factories' => [
      'Blog\Controller\Index' => 'Blog\Controller\IndexControllerFactory',
    ],
  ],
  'router' => [
    'routes' => [
      'blog_index' => [
        'type'  => 'Literal',
        'options' => [
          'route' => '/blog',
          'defaults' => [
            'controller' => 'Blog\Controller\Index',
            'action'     => 'index'
          ]
        ],
        'may_terminate' => true,
      ]
    ]
  ],
  'view_manager' => [
    'template_path_stack' => [
      __DIR__ . '/../view'
    ]
  ]
];
