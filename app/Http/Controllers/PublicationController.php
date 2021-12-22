<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\PublicationRequest;
use App\Models\Publication;
use App\Services\ImageService;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    private $imageService;

    public function __construct(ImageService $service)
    {
        $this->imageService = $service;
    }

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
//        dd($data);
        $publication = new Publication();
        $publication->user_id = auth()->user()->id;
        $publication->category = $data['category'] ?? '';
        $publication->title = $data['title'] ?? '';
        $publication->description = $data['description'] ?? '';
        $publication->amount_needed = $data['amount_needed'] ?? '';
        $publication->start_date = $data['start_date'] ?? '';
        $publication->end_date = $data['end_date'] ?? '';
        if(isset($data['img'])){
            $image = $this->imageService->store($request['img']);
            $publication->image_id = $image->id;
        }
        $publication->save();
        return redirect()->route('profile.index')->with('success','Фонд успешно создан');
    }
}
