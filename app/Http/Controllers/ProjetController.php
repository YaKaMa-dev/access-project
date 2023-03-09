<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projet;
use App\Models\Access;
use Auth;


class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(Auth::user()->isAdmin) $projets = Projet::query()->paginate(3);
        else $projets = Projet::where('user_id',Auth::user()->id)->paginate(3);

        return view('projets.index',[
            'projets'=>$projets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => ['required','min:8','max:25'],
        ]);

        $projet = new Projet();

        $projet->libele = $request->input('project_name');
        $projet->user_id = Auth::user()->id;

        $projet->save();

        return redirect()->route('projets.index')->with('succes','Projet created successesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        $accesses = Access::where('projet_id',$projet->id)->paginate(3);
        return view('projets.show',[
            'projet' => $projet,
            'accesses' => $accesses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.edit',[
            'projet' => $projet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => ['required','min:8','max:25'],
        ]);

        $projet = Projet::findOrFail($id);

        $projet->libele = $request->input('project_name');
        $projet->user_id = Auth::user()->id;

        $projet->save();

        return redirect()->route('projets.index')->with('succes','Projet updated successesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();
        return redirect()->route('projets.index')->with('succes','Projet Deleted successesfully');
    }
}
