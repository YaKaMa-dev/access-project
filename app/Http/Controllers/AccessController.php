<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use App\Models\Projet;
use App\Models\Access;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projetId)
    {
        $projet = Projet::findOrFail($projetId);
        return view('accesses.create',[
            'projet' => $projet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$projetId)
    {
        $request->validate([
            'username' => ['required', 'unique:accesses,username','min:8','max:50'],
            'password' => ['required','min:8'],
        ]);

        $access = new access();

        $access->username = $request->input('username');
        $access->password = Crypt::encryptString($request->input('password'));
        $access->projet_id = $projetId;
        $access->link = route('projets.show', ['projet' => $projetId]);

        $access->save();

        return redirect()->route('projets.show',$projetId)->with('succes','Access created successesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($projetId,$accessId)
    {
       $access = Access::findOrFail($accessId);
       $decryptedPass = Crypt::decryptString($access->password);
       return view('accesses.show',[
        'access' => $access,
        'projetId' => $projetId,
        'password' => $decryptedPass,
    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($projetId,$accessId)
    {
        $access = Access::findOrFail($accessId);
        return view('accesses.edit',[
            'access' =>$access,
            'projetId' => $projetId
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projetId, $accessId)
    {
        $request->validate([
            'password' => ['required','min:8'],
        ]);

        $access =  Access::findOrFail($accessId);

        $access->password = Crypt::encryptString($request->input('password'));
        
        $access->save();

        return redirect()->route('projets.show',$projetId)->with('succes','Access updated successesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($projetId,$accessId)
    {
        $access = Access::findOrFail($accessId);
        $access->delete();

        return redirect()->route('projets.show',$projetId)->with('succes','Access deleted successesfully');
    }
}
