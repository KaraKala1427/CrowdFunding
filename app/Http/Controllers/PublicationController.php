<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        return view('pages.publications.publish');
    }

    public function updatePublication($id){
        $publication = new Publication();
        return view('pages.publications.update-publication', ['data' => $publication->find($id)]);
    }

    public function store(PublicationRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $publication = new Publication();

    }
}
