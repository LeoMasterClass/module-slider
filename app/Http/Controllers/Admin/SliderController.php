<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Validator;
use Image;
use File;
use Auth;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();

        return view('admin.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => 'required', 'string',
            "img" => 'image|mimes:jpeg,png,jpg|max:1000',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $slider = new Slider;

        $slider->title = $request->title;

        if($request->hasFile('img')){
            $img = $request->file('img');

            $fileName = time() . '.' . $img->getClientOriginalExtension();

            // chemin d'acces au image
            $imagePath = 'img/image_slider/';
            $imageMinPath = 'img/image_slider_thumbnail/';

            $imgMin = Image::make($img)->resize(50,50)->save($imageMinPath.$fileName);
            $img = Image::make($img)->save($imagePath.$fileName);

            $slider->img_thumb = $imageMinPath.$fileName;
            $slider->img = $imagePath.$fileName;
        }

        $slider->save();

        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'img' => 'image|mimes:jpeg,png,jpg|max:1000'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }


        $slider->title = $request->title;
        $slider->updated_at = Carbon::now();

        if($request->hasFile('img')){
            $img = $request->file('img');

            $fileName = time() . '.' . $img->getClientOriginalExtension();

            $imagePath = 'img/image_slider/';
            $imageMinPath = 'img/image_slider_thumbnail/';

            $imgMin = Image::make($img)->resize(50,50)->save($imageMinPath.$fileName);
            $img = Image::make($img)->save($imagePath.$fileName);


            $slider->img = $imagePath.$fileName;
            $slider->img_thumb = $imageMinPath.$fileName;
        }


        $slider->update();

        return redirect()->route('admin.slider.index', $slider->id)->withStatus("L'image a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {


        File::delete($slider->img, $slider->img_thumb);

        $slider->delete();

        return redirect()->route('admin.slider.index')->withStatus('La question a bien été supprimée !');
    }
}
