<?php

namespace App\Http\Controllers;

use App\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // recuperation des données de la BDD de l'user et création de la boucle pour renvoyer un tableau
        $data = $request->request->all();
        $user = Auth::user();
        $id_user = $user->id;
        $test = Candidature::where('id_user', $id_user)->get();

        return view('home')->with("test", $test);
    }

    // insertion d'une nouvelle ligne dans la BDD
    public function create(Request $request)
    {
        //dd($request->request);
        $data = $request->request->all();
        $user = Auth::user();
        $id_user = $user->id;
        Candidature::create([
            'poste' => $data['poste'],
            'id_user' => $id_user,
            'lieu' => $data['lieu'],
            'lien' => $data['lien'],
            'entreprise' => $data['entreprise'],
            'mail' => $data['mail'],
            'téléphone' => $data['telephone'],
            'état_candidature' => 'en cours',
        ]);


        $test = Candidature::where('id_user', $id_user)->get();

        return redirect('/home')->with("test", $test);
    }

    public function modif(Request $request)
    {
        // recuperation de l'id de la candidature
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        $id_candidature = $url[2];

        // vérification que l'user qui veut modifier la candidature est le bon
        $user = Auth::user();
        $id_user = $user->id;

        $candidature = Candidature::where('id', $id_candidature)->get();

        if ($candidature[0]["id_user"] === $id_user) {

            return view('modif')->with("candidature", $candidature[0]);
        } else {
            return redirect()->back();
        }
    }

    public function modifdb(Request $request)
    {
        // recupération des données pour la page home
        $user = Auth::user();
        $id_user = $user->id;
        $test = Candidature::where('id_user', $id_user)->get();

        $data = $request->request->all();
        //dd($data);

        $update = Candidature::where('id', $data["id"])->update([
            'poste' => $data['poste'],
            'lieu' => $data['lieu'],
            'lien' => $data['lien'],
            'entreprise' => $data['entreprise'],
            'mail' => $data['mail'],
            'téléphone' => $data['telephone'],
            'état_candidature' => $data['etat_candidature'],
        ]);

        return redirect('/home')->with("test", $test);
    }

    public function supp(Request $request)
    {
        // recupération de l'id de la candidature
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        $id_candidature = $url[2];
        //dd($id_candidature);


        // vérification que l'user qui veut supp la candidature est le bon
        $user = Auth::user();
        $id_user = $user->id;

        $candidature = Candidature::where('id', $id_candidature)->get();

        if ($candidature[0]["id_user"] === $id_user) {

            Candidature::where('id', $id_candidature)->delete();
            $user = Auth::user();
            $id_user = $user->id;
            $test = Candidature::where('id_user', $id_user)->get();

            return redirect('/home')->with("test", $test);
        } else {
            return redirect()->back();
        }
    }
}
