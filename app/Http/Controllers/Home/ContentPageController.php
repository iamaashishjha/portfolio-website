<?php

namespace App\Http\Controllers\Home;

use App\Models\History;
use App\Models\Goverment;
use App\Models\Parliament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Base\BaseHomeController;

class ContentPageController extends BaseHomeController
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
        $this->data['parliaments'] = Parliament::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.parliament.index', $this->data);
    }

    public function showParliament($id)
    {
        $this->data['parliament'] = Parliament::find($id);
        return view('customHome.parliament.show', $this->data);
    }

    public function listGoverment()
    {
        $this->data['goverments'] = Goverment::orderBy('created_at', 'DESC')->paginate(10);
        return view('customHome.goverment.index', $this->data);
    }

    public function showGoverment($id)
    {
        $this->data['goverment'] = Goverment::find($id);
        return view('customHome.goverment.show', $this->data);
    }
}
