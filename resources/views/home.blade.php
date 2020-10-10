@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <p>
                Conseil personnel pensez à sauvegarder AILLEURS vos données en cas de soucis, un moyen facile et rapide étant de screener la page tout simplement.
            </p>
            <form action="home" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Lien de l'annonce</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" name="lien">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Titre du poste</label>
                    <div class="col-sm-10">
                        <input type="text" name="poste" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Entreprise</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="entreprise">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Lieu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lieu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Mail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Téléphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telephone">
                    </div>
                </div>





                <div class="text-center">
                    <button type="submit" class="btn btn-primary">envoyer</button>
                </div>

            </form>

            <table class="tftable mt-3" border="1">
                <tr><th>Poste</th><th>Entreprise</th><th>Lieu</th><th>Mail</th><th>Téléphone</th><th>Lien</th><th>Date candidature</th><th>Etat Candidature</th><th>Modifier</th><th>Supprimer</th></tr>




                @foreach($test as $k)
                <tr>
                    <td>{{ $k->poste }}</td>
                    <td>{{ $k->entreprise }}</td>
                    <td>{{ $k->lieu }}</td>
                    <td>{{ $k->mail }}</td>
                    <td>{{ $k->téléphone }}</td>
                    <td><a href="{{ $k->lien }}">{{ $k->lien }}</a></td>
                    <td>{{ $k->created_at }}</td>
                    <td>{{ $k->état_candidature }}</td>
                    <td><a href={{ url('tapage/' . $k->id) }} type='button' class='btn btn-success'>Modifier</a></td>
                    <td><a href={{ url('suppression/' . $k->id) }} type='button' class='btn btn-danger'>Supprimer</a></td>
                <tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
