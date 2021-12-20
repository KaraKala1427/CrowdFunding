<?php

namespace App\Http\Controllers;

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
}
