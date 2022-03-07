@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">AUTOMOVILES</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-automovil')
                        <a class="btn btn-warning" href="{{ route('automoviles.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">PLACA</th>
                                    <th style="color:#fff;">MARCA</th>
                                    <th style="color:#fff;">COLOR</th> 
                                    <th style="color:#fff;">OBSERVACIONES</th>                                     
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($automoviles as $automovil)
                            <tr>
                                <td style="display: none;">{{ $automovil->id }}</td>                                
                                <td>{{ $automovil->placa}}</td>
                                <td>{{ $automovil->marca}}</td>
                                <td>{{ $automovil->color}}</td>
                                <td>{{ $automovil->observaciones}}</td> 
                                <td>
                                    <form action="{{ route('automoviles.destroy',$automovil->id) }}" method="POST">                                        
                                        @can('editar-automovil')
                                        <a class="btn btn-info" href="{{ route('automoviles.edit',$automovil->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-automovil')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $automoviles->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
