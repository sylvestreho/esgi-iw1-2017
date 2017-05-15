<?php

namespace User\Repository;

use Application\Repository\RepositoryInterface;
use User\Entity\User;

interface UserRepository
{
  public function add(User $user);

  public function generatePassword($clearPassword);

  public function getAuthenticationAdapter();
}
