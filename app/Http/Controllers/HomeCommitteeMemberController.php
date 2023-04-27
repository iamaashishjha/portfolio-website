<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Traits\Base\BaseHomeController;

class HomeCommitteeMemberController extends BaseHomeController
{
    public function listCommittee()
    {
        $this->data['committees'] = Committee::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.committee.index', $this->data);
    }

    public function showCommittee($id)
    {
        $this->data['committee'] = Committee::find($id);
        return view('customHome.committee.show', $this->data);
    }
}
