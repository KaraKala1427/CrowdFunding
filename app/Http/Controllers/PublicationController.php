<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\PublicationRequest;
use App\Models\Category;
use App\Models\Publication;
use App\Services\ImageService;
use Carbon\Carbon;
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
        $categories = Category::all();
        return view('pages.publications.publish',compact('categories'));
    }


    public function store(PublicationRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $publication = new Publication();
        $publication->user_id = auth()->user()->id;
        $publication->category_id = (int)$data['category_id'] ?? '';
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

    public function getPublication($id)
    {
        $profile = auth()->user();
        $publication = Publication::find($id);
        $leftDays =  Carbon::parse($publication->start_date)->diffInDays(Carbon::parse($publication->end_date));
        return view('pages.publications.one-publication',compact('profile','publication','leftDays'));
    }

    public function getEdit($id)
    {
        $profile = auth()->user();
        $publication = Publication::find($id);
        $categories = Category::all();
        return view('pages.publications.edit-publication',compact('profile','publication','categories'));
    }

    public function update(PublicationRequest $request, $id)
    {
        $data = $request->validated();
//        dd($data);
        $publication = Publication::find($id);
        $publication->user_id = auth()->user()->id;
        $publication->category_id = (int)$data['category_id'] ?? '';
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


    public function delete($id)
    {
        Publication::find($id)->delete();
        return redirect()->route('profile.index')->with('success','Объявление было удалено');
    }

    public function publicationsByCategory($id)
    {
        $category = Category::find($id);
        $publications = $category->publications;
        $categoryName = $category->name;
        return view('pages.publications.category-publications',compact('publications','categoryName'));
    }
}
