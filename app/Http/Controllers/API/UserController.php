<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function creation(Request $req)
    {

        if ($req->file('avatar')) {

            $avatar = $req->file('avatar');
            //dd($avatar);
            $filename = time() . uniqid() . "." . $avatar->getClientOriginalExtension();
            // dd($filename);
            // $avatar->storeAS('public/avatar', $filename)
        }
//dd($filename);
        $user = new User();
        $user->nom = ucwords(strtolower(trim($req->nom)));
        $user->prenom = ucwords(strtolower(trim($req->prenom)));
        $user->telephone = $req->telephone;
        $user->avatar = $filename;
        $user->email = $req->email;
        $user->password = Hash::make("12345678");
        $user->profil_id = $req->profil_id;
        $profils = Profil::where('id', $req->profil_id)
            ->get();
        if ($profils[0]->libelle == 'Agence') {
            $user->nomAgence = $req->nomAgence;
            $user->compteur = $req->compteur;
        }
        $user->compteur = 0;
        $user->adresse = $req->adresse;
        $user->archivage = false;
        $token = $user->remember_token = Str::random(80);
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'user' => $user,
            'token' => $user->createToken("API TOKEN")->plainTextToken

        ], 200);

    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
       // dd('test');
        $credentials = request(['email', 'password']);
        //dd($credentials);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Login ou mot de passe inccorte!!'], 401);
        }
        $user = User::where('email', $request->email)->first();


        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'profil' => $user->profil,
            'user' => $user,
            'enseignent' => $user->enseignent

        ], 200);
    }

    /*Liste des users en activites*/
    function getUsers(){
        $users = User::where('archivage', false)
            ->get();
        foreach ($users as $user){

            $data[] = [
                'id'=> $user->id,
                'nom'=> $user->nom,
                'prenom'=> $user->prenom,
                'email'=> $user->email,
                'avatar'=> $user->avatar,
                'telephone'=> $user->telephone,
                'profil'=> $user->profil->libelle,
                //'profil_id'=> $user->profil->id,
                //'enseignent'=>$user->enseignent,
            ];
        }
        return response()->json([
            'donnees'=> $data
        ]);
    }

    public function getUserById($id)
    {

        $user = User::find($id);
        return response([
            'message' => 'user retrouvés',
            'user'    => $user,
        ]);

    }
    function updateUser(Request $request, $id){

        $user = User::find($id);
        $update = $request->all();
       // $avatar = $request->file('avatar');
        if($request->file('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().uniqid().".".$avatar->getClientOriginalExtension();
            //$avatar->storeAS('public/avatar', $filename);
            $update['avatar'] = $filename;
            // suppresion l'avaatr

        }
        $user->update($update);
        return response([
            'message'=> 'user update',
            'donnees'=> $user
        ]);
    }

    function deleteUser($id){
        $user = User::find($id);
        if($user){
            $user->archivage = true;
            $user->save();
            return response([
                'message'=> 'User supprimer avec succsse!!!!',
            ]);
        }
    }
    //  de archivage un utilisateur
    function archiveUser($id){
        $user = User::find($id);
        if($user){
            $user->archivage = false;
            $user->save();
            return response([
                'message'=> 'User Dé Archive  avec succsse!!!!',
            ]);
        }
    }
}
