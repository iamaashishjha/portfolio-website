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
}
