<?php

namespace App\Repositories\Interfaces;

interface MembershipInterface
{
    public function storeOrUpdateMembership(array $requestsArr);
}
