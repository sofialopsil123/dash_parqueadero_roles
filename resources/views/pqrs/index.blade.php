@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">PQRS</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-pqr')
                        <a class="btn btn-warning" href="{{ route('pqrs.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">SOLICITUD</th>
                                    <th style="color:#fff;">MOTIVO</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($pqrs as $pqr)
                            <tr>
                                <td style="display: none;">{{ $pqr->id }}</td>                                
                                <td>{{ $pqr->solicitud}}</td>
                                <td>{{ $pqr->motivo}}</td>
                                <td>
                                    <form action="{{ route('pqrs.destroy',$pqr->id) }}" method="POST">                                        
                                        @can('editar-pqr')
                                        <a class="btn btn-info" href="{{ route('pqrs.edit',$pqr->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-pqr')
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
                            {!! $pqrs->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection