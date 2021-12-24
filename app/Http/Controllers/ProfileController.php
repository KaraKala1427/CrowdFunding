<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\PostRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $imageService;

    public function __construct(ImageService $service)
    {
        $this->imageService = $service;
    }
    public function index()
    {
        $profile = auth()->user();
        $publications = $profile->publications;
        $imageModel = $this->imageService->get($profile->image_id);
        $imagePath = $imageModel->data->path ?? '';
        return view('pages.profile.profile', compact('profile','imagePath','publications'));
    }

    public function getEdit()
    {
        $profile = auth()->user();
        $imageModel = $this->imageService->get($profile->image_id);
        $imagePath = $imageModel->data->path ?? '';
        return view('pages.profile.edit-profile',['data' => $profile, 'imagePath' => $imagePath]);
    }

    public function update(PostRequest $request)
    {
        $request = $request->validated();
        $profile = auth()->user();
        $profile->full_name = $request['full_name'];
        $profile->email = $request['email'];
        $profile->position = $request['position'] ?? null;
        $profile->phone_number = $request['phone_number'];
        $profile->address = $request['address'] ?? null;
        if(isset($request['img'])){
            $image = $this->imageService->store($request['img']);
            $profile->image_id = $image->id;
        }
        $profile->save();

        return redirect()->route('profile.index')->with('success','Профиль успешно обновлено');
    }
}
