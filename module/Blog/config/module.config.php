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
        'child_routes' => [
          'paged' => [
            'type'    => 'Segment',
            'options' => [
              'route' => '/page/:page',
              'constraints' => [
                'page' => '[0-9]+'
              ],
              'defaults' => [
                'controller'  => 'Blog\Controller\Index',
                'action'      => 'index'
              ]
            ]
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
      ],
      'blog_edit' => [
        'type'  => 'Segment',
        'options' => [
          'route' => '/blog/post/edit/:postId',
          'constraints' => [
              'postId' => '[0-9]+'
          ],
          'defaults' => [
            'controller'  => 'Blog\Controller\Index',
            'action'      => 'edit'
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
