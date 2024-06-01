<?php

namespace App\Repositories\Interfaces;

interface MembershipInterface
{
    public function generateMembershipId();
    public function storeOrUpdateMembership(array $requestsArr, int $modelId);
}
