<?php

namespace App\Repositories\Interfaces;

use App\Models\Membership\Member;
use App\Traits\Base\BaseInterface;

interface MembershipInterface extends BaseInterface
{
    public function getMembershipFormData();
    public function getRegisteredMemebers();
    public function getApprovedMemebers();
    public function storeOrUpdateMembership(array $requestsArr, ?int $modelId): Member;
    public function approveMember(int $modelId);
}
