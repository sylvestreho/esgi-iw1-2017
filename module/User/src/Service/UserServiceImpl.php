<?php

namespace User\Service;

use User\Entity\User;

class UserServiceImpl implements UserService
{
  protected $userRepository;

  public function add(User $user)
  {
    $this->userRepository->add($user);
  }

  public function getUserRepository()
  {
    return $this->userRepository;
  }

  public function setUserRepository($userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function getAuthenticationService()
  {
    $authenticationAdapter = $this->userRepository->getAuthenticationAdapter();

    return new AuthenticationService(null, $authenticationAdapter);
  }

  public function login($email, $password)
  {
    $authenticationService = $this->getAuthenticationService();

    $authenticationAdapter = $authenticationService->getAdapter();
    $authenticationAdapter->setIdentity($email);
    $authenticationAdapter->setCredential($password);

    $result = $authenticationService->authenticate();

    if ($result->isValid()) {
      $identityObject = $authenticationAdapter->getResultRowObject(
          null,
          ['password'] // exclude password
      );
      $authenticationService->getStorage()->write($identityObject); // write to session

      return true;
    }

    return false;
  }
}
