<?php

namespace User\Service;

use User\Entity\User;

interface UserService
{
  public function add(User $user);

  public function getAuthenticationService();

  public function login($email, $password);
}
