<?php

namespace App\Http\Controllers;

use App\Episode;
use Auth;
use App\Http\Resources\Episode as EpisodeResource;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::guest()) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        // Get episodes
        $episodes = Episode::paginate(10);

        // Return collection of episodes as a resource
        //return EpisodeResource::collection($episodes);

        return view('episodes.index')->with('episodes', $episodes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('episodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Episode;
        $post->download_url = $request->input('download_url');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->episode_number = $request->input('episode_number');
        $post->user_id = auth()->user()->id;

        if ($post->save()) {
            return redirect('/');
            //return new EpisodeResource($post);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'download_url' => 'required',
            'title' => 'required',
            'description' => 'required',
            'download_url' => 'required',
            'episode_number' => 'required',
        ]);

        //Create Post
        $post = Episode::find($id);
        $post->download_url = $request->input('download_url');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->episode_number = $request->input('episode_number');

        if ($post->save()) {
            return redirect('/');
            //return new EpisodeResource($post);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get article
        $episode = Episode::findOrFail($id);

        // Return single article as a resource
        return new EpisodeResource($episode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episode::find($id);
        //check for correct user

        return view('episodes.edit')->with('episode', $episode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::findOrFail($id);

        if ($episode->delete()) {
            return redirect('/');
            //return new EpisodeResource($episode);
        }

    }
}
