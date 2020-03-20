<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
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
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type_id = $request->type_id;
        $user->section_id = $request->section_id;

        // Validação de senha será feita no front-end com javascript
        $user->password = $request->password;         
    
        // Regra para validação e upload da imagem em public/users
        if($request->hasFile('user_image')){
            $name = date('HisdmY') . $user->name;
            $extension = $request->user_image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->user_image->storeAs('public/users/', $nameFile);  
            if(!$upload){
                return redirect()
                        ->back()
                        ->with('upload-error', 'Falha ao salvar foto do usuário...')
                        ->withInput();
            }else{
                    $user->user_image = $nameFile;
            }
        }

        if($user->save()){
            session()->flash('user-created','Usuário cadastrado...');
            return redirect()->route('user.index');
        }else{
            session()->flash('user-error','Erro ao cadastrar usuário...');
            return redirect()->route('user.create')->withInput([
                $request->name,
                $request->email,
                $request->password,
                $request->section_id,
                $request->type_id,
                $request->user_image,
            ]);
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
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
