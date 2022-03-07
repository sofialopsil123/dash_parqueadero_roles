@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">EDITAR AUTOMOVIL</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('automoviles.update',$automovil->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="placa">PLACA</label>
                                   <input type="text" name="placa" class="form-control" value="{{ $automovil->placa}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">                    
                                <div class="form-floating">
                                <label for="marca">MARCA</label>
                                <textarea class="form-control" name="marca" style="height: 100px">{{ $automovil->marca}}</textarea>                                 
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">                    
                                <div class="form-floating">
                                <label for="color">COLOR</label>
                                <textarea class="form-control" name="color" style="height: 100px">{{ $automovil->color}}</textarea>                                 
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">                    
                                <div class="form-floating">
                                <label for="observaciones">OBSERVACIONES</label>
                                <textarea class="form-control" name="observaciones" style="height: 100px">{{ $automovil->observaciones}}</textarea>                                 
                                </div>

                               

                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection