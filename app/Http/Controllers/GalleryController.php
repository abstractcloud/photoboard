<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Upload;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use Auth;

//use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.(Показать список ресурсов)
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $gallery = Gallery::getGallery($id);
        
        return view('gallery.index', [
            'gallery' => $gallery
        ]);
    }
    
    public function gallery()
    {
        $gallery = Gallery::getGallery();
        
        return response()->json($gallery);
    }

    /**
     * Show the form for creating a new resource.(Показать форму для создания нового ресурса)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.(Сохранить вновь созданный ресурс в хранилище)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $upload = new Upload();
        
        $data = $request->all();
//        dd($data);
        
        $file = $request->file('image');
        
        $name = $file->hashName();
        
        $file->move($upload->getFullPath(), $name);
        
        $upload->createPreview($name);
        
        $data = array_merge($data, [
            'path' => $upload->getDirectory(),
            'image' => $name,
            'private' => (bool)$request->get('private'),
            'preview' => 'preview_' . $name,
            'user_id' => Auth::user()->id,
        ]);
        
        Gallery::create($data);
        
        return redirect()->route('default');
    }

    /**
     * Display the specified resource.(Показать указанный ресурс)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.(Показать форму для редактирования указанного ресурса)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.(Обновить указанный ресурс в хранилище)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.(Удалить указанный ресурс из хранилища)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
