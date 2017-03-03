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
        ]
      ],
      'blog_add' => [
        'type'  => 'Literal',
        'options' => [
          'route' => '/blog/post/add',
          'defaults' => [
            'controller' => 'Blog\Controller\Index',
            'action'  => 'add'
          ]
        ]
      ]
    ]
  ],
  'view_manager' => [
    'template_path_stack' => [
      __DIR__ . '/../view'
    ]
  ]
];
