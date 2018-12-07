<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\models\Pensamiento;

class PensamientoController extends Controller
{
    public function _construct ()
    { dd(12333333);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =Auth::id();
        $pensamiento = Pensamiento::where('user_id',$user)->get();

        return $pensamiento;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pensamieto = new Pensamiento ();
        $pensamieto->description = $request->description;
        $pensamieto->user_id = auth()->id();
        $pensamieto->save();
        return response()->json($pensamieto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pensamieto =Pensamiento::find($id);
        $pensamieto->description = $request->description;
        $pensamieto->save();
        return $pensamieto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pensamieto =Pensamiento::find($id);
        $pensamieto->delete();
    }
}
