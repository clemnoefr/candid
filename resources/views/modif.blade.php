@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <form action="modifdb" method="POST">
                @csrf
<!-- sécuriser accès à la page pour éviter d'accéder à un commentaire qui n'est pas à soi !-->
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Lien de l'annonce</label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control" name="lien" value="{{$candidature->lien}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Titre du poste</label>
                    <div class="col-sm-10">
                        <input type="text" name="poste" class="form-control" value="{{$candidature->poste}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Entreprise</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="entreprise" value="{{$candidature->entreprise}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Lieu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lieu" value="{{$candidature->lieu}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Mail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mail" value="{{$candidature->mail}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Téléphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telephone" value="{{$candidature->téléphone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Etat Candidature</label>
                    <div class="col-sm-10">

                        <select class="form-control" id="exampleFormControlSelect1" name="etat_candidature">
                            <option>En cours</option>
                            <option>Entretien</option>
                            <option>Accepté</option>
                            <option>Refusé</option>
                          </select>
                    </div>
                </div>

            <input type="hidden" value="{{$candidature->id}}" name="id">





                <div class="text-center">
                    <button type="submit" class="btn btn-primary">envoyer</button>
                </div>

            </form>


        </div>
    </div>
</div>
@endsection
