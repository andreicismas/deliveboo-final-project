@extends('layouts.app')
@section('content')
<div class="for-the-nav">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard di ') }} {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-2 mb-2">
                        {{ __('Ciao') }} <em>{{ Auth::user()->name }}</em>
                    </div>
                    <div class="card" >
                        <img class="img-thumbnail" src={{ asset('storage/covers/'.auth()->user()->id .'/'.auth()->user()->cover_UR)}}>

                        <h3 class="ml-4 mt-3">Dati Ristorante <span><em>{{ Auth::user()->name }}</em></span></h3>
 
                        <div class="table-responsive-md table-responsive-sm card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Nome Ristorante</th>
                                        <th scope="col">Email Ristorante</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td><em class="badge badge-secondary">{{ Auth::user()->name }}</em></td>
                                        <td><em class="badge badge-secondary">{{ Auth::user()->email }}</em></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th scope="col">indirizzo Ristorante</th>
                                        <th scope="col">P.IVA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                       
                                        <td><em class="badge badge-secondary">{{ Auth::user()->address }}</em></td>
                                        <td><em class="badge badge-secondary">{{ Auth::user()->VAT }}</em></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-around">

                            <a  class="btn btn-primary" href="{{ route('dishes.index') }}">Vedi menù</a>
                            <a  class="btn btn-primary" href="{{ route('dishes.create') }}">Carica nuovi piatti</a>
                            <a  class="btn btn-primary" href="{{ route('orders.index') }}">Storico Ordini</a>
                        </div>

                    

                    </div>
                

                              
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
