<?php

namespace App\Repositories\Interfaces;

use App\Traits\Base\BaseInterface;

interface MembershipInterface extends BaseInterface
{
    public function getRegisteredMemebers();
    public function getApprovedMemebers();
    public function storeOrUpdateMembership(array $requestsArr, int $modelId);
    public function approveMember(int $modelId);
}
