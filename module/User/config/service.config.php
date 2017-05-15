<?php

namespace User;

return [
  'invokables' => [
    'User\Repository\UserRepository' => 'User\Repository\UserRepositoryImpl'
  ]
  'factories' => [
    'User\Service\UserService' => function(\Zend\ServiceManager $sm) {
      $userService = new \User\Service\UserServiceImpl();
    },
    'User\InputFilter\AddUser' => function (\Zend\ServiceManager\ServiceManager $sm) {
      $addUserFilter = new \User\InputFilter\AddUser($sm->get('Zend\Db\Adapter\Adapter'));

      return $addUserFilter;
    }
  ]
];
