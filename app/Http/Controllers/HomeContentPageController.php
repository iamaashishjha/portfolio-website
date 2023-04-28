<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Traits\Base\BaseHomeController;

class HomeContentPageController extends BaseHomeController
{
    public function listHistory()
    {
        $this->data['histories'] = History::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.history.index', $this->data);
    }

    public function showHistory($id)
    {
        $this->data['history'] = History::find($id);
        return view('customHome.history.show', $this->data);
    }

    public function listParliament()
    {
        $this->data['parliaments'] = History::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.history.index', $this->data);
    }

    public function showParliament($id)
    {
        $this->data['parliament'] = History::find($id);
        return view('customHome.history.show', $this->data);
    }

    public function listGoverment()
    {
        $this->data['goverments'] = History::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.history.index', $this->data);
    }

    public function showGoverment($id)
    {
        $this->data['goverment'] = History::find($id);
        return view('customHome.history.show', $this->data);
    }
}
