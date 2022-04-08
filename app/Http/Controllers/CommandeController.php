<?php

namespace App\Http\Controllers;

use App\GCommande;
use App\GReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function create()
    {
        return view('commande.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function index()
    {
        return view('commande.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $titre = $request->input("titre");
        $heure = $request->input('heure');
        $description = $request->input('description');

        $newCommande = new GCommande();
        $newCommande->user_id =  Auth::id();
        $newCommande->titre =  $titre;
        $newCommande->heure =  $heure;
        $newCommande->description =  $description;
        $image = Str::uuid();
        $newCommande->image = asset('storage/'.$image.'/image.jpg');
        $newCommande->save();

        if(count($request->file()) > 0){
            Storage::disk('public')->putFileAs($image,$request->file()['img'],'image.jpg');
        }
        return redirect()->route('home');

    }



    public function passe(){

    }

    public function dete(){
        $resa = GReservation::query()->where('user_id','=',Auth::id())->get();
        return view('commande.dete')->with(['reservations' => $resa]);
    }



    public function delete(Request $request){
        $id = $request->input('id');
        $commande = GCommande::find($id);
        if ($commande->user_id == Auth::id()){
            $commande->delete();
        }
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show($id)
    {
        $commande = GCommande::find($id);
        return view('commande.show')->with(['commande' => $commande]);
    }

    public function send(Request $request){
        $id = $request->input('idCommande');
        $commande = $request->input('commande');
        $tel = $request->input('tel');

        $newResa = new GReservation();
        $newResa->demande_id = $id;
        $newResa->user_id = Auth::id();
        $newResa->commande = $commande;
        $newResa->tel = $tel;
        $newResa->save();

        return redirect()->route('home')->with(['success' => "Votre demande à été envoyé au créateur de la commande"]);

    }


    public function showAll(){

        $commandes = GCommande::query()->where('user_id','=',Auth::id())->get();
        $resa = GReservation::query()->where('user_id','=',Auth::id())->get();
        return view('commande.showAll')->with(['commandes' =>$commandes,'reservations' => $resa]);
    }

    public function showPeople($id){

        $resa = GReservation::query()->where('demande_id','=',$id)->get();

        return view('commande.showPeople')->with(['reservations' => $resa]);
    }

    public function sendConf(Request $request){
        $id = $request->input('idResa');

        if($request->prix != null){
            $prix = $request->prix;
        } else{
            $prix = 0;
        }

        $resa = GReservation::find($id);

        $resa->prix = $prix;
        $resa->state = "ok";
        $resa->save();

        return redirect()->route('showAll.commande');

    }

    public function refuse(Request $request) {
            $id = $request->input('id');
            $resa = GReservation::find($id);
            $resa->state = "refuser";
            $resa->save();
    }

}
