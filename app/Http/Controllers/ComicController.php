<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->paginate(6);
        $direction = 'desc';
        return view('comics.index', compact('comics', 'direction'));
    }

    public function orderby($column, $direction){
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $comics = Comic::orderBy($column, $direction)->paginate(6);

        return view('comics.index', compact('direction', 'comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('comics.store');

        $method = 'POST';

        $comic = null;

        $title = 'New comic book';

        return view('comics.create-edit', compact('route', 'method', 'comic', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Comic::generateSlug($form_data['title']);
        $new_comic = new Comic();
        $new_comic->fill($form_data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $route = route('comics.update', $comic);
        $method = 'PUT';
        $title = $comic->title;
        return view('comics.create-edit', compact('comic', 'route', 'method', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComicRequest $request, Comic $comic)
    {
        $form_data = $request->all();
        if($form_data['title'] != $comic->title){
            $form_data['slug'] = Comic::generateSlug(($form_data['title']));
        }else{
            $form_data['slug'] = $comic->slug;
        }

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('deleted', 'Elimiation succeeded!');
    }
}
