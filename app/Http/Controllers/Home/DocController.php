<?php

namespace App\Http\Controllers\Home;

use App\Models\Library;
use App\Models\Document;
use App\Traits\Base\BaseHomeController;

class DocController extends BaseHomeController
{
    public function listLibrary()
    {
        $this->data['libraries'] = Library::paginate(5);
        return view('customHome.library.index', $this->data);
    }

    public function showLibrary($id)
    {
        $this->data['library'] = Library::find($id);
        return view('customHome.library.show', $this->data);
    }

    public function showDocument($id)
    {
        $this->data['document'] = Document::find($id);
        return view('customHome.documents.show', $this->data);
    }
}
