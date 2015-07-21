<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Response;
use Illuminate\Http\Request;
use App\Word;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($name)
    {
        $words = Word::where('name','like',$name.'%')->take(10)->lists('name','info');
        $respon = [];
        foreach ($words as $info => $name) {
            $respon[] = array('name' => $name,'info'=> $info); 
        }
        if ($respon) {
            return Response::json($respon,200,[]);
        }
        return Response::json([],404,[]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $word = Word::where('name',$request->name)->first();
        if($word)
        {
            return view('word.detail', $word->toArray());
        }
        $word = new Word;
        $word->name = $request->name;
        $word->save();
        return view('word.detail', ['name' => $request->name, 'info' => '', 'created_at' => '']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($name)
    {
        $word = Word::where('name',$name)->first();
        return view('word.detail', $word->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $word = Word::where('name',$request->name)->first();
        if($word)
        {
            $word->info = $request->newInfo;
            $word->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function time(Request $request)
    {
        $starttime = Carbon::createFromTimestamp(intval(($request->starttime/1000)));
        $endtime = Carbon::createFromTimestamp(intval(($request->endtime/1000)));

        if ($endtime == $starttime) {
            $starttime = $starttime->subDays(1);
        }

        $words = Word::whereBetween('created_at',[$starttime->toDateTimeString(),$endtime->toDateTimeString()])->lists('name','info');
        $respon = [];
        foreach ($words as $info => $name) {
            $respon[] = array('name' => $name,'info'=> $info); 
        }
        if ($respon) {
            return Response::json($respon,200,[]);
        }
        return Response::json([],404,[]);
    }
}
