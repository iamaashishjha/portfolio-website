<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Leadership;
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

    public function listLeadership()
    {
        $this->data['committees'] = Leadership::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.leadership.index', $this->data);
    }

    public function showLeadership($id)
    {
        $this->data['committee'] = Leadership::find($id);
        return view('customHome.leadership.show', $this->data);
    }
}
