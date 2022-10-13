@extends('admin.layout')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lista de Tours Home</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item active">Lista Tours Popolares</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Tours populares | Home</h3>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i> Nuevo tour popular
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tours-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>$ Adulto</th>
                    <th>$ Menor</th>
                    <th>Tipo de Cambio</th>
                    <th>Tipo Actividad</th>
                    {{-- <th>Destinos</th> --}}
                    <th>status</th>
                    <th>Fecha Modificacion</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tourspopular as $tourpopular)
                <tr>
                    <td>{{ $tourpopular->id }}</td>
                    <td>{{ $tourpopular->nombre }}</td>
                    <td>$ {{ $tourpopular->PRAD }} USD</td>
                    <td>$ {{ $tourpopular->PRMD }} USD</td>
                    <td>{{ $tourpopular->typechange->titulo ?? ""}} - ${{ $tourpopular->typechange->valor ?? ""}}.00 MXN</td>
                    <td>{{ $tourpopular->category->nombre ?? ""}}</td>
                    {{-- <td>
                        @foreach ($tourspopular->destinations as $destination)
                        {{ $destination->name }},
                        @endforeach
                    </td> --}}
                    <td>{{ $tourpopular->status }}</td>
                    <td>{{ $tourpopular->fecha_modificacion->format('d/M/Y-H:i') }}</td>
                    <td>
                        <a href="{{ route('tours.show', $tourpopular) }}" class="btn btn-xs btn-info" target="_blank">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('dashboard.populartours.edit', $tourpopular) }}" class="btn btn-xs btn-info">
                            <i class="fa fa-pen"></i>
                        </a>
                        {{-- <form action="POST" action="{{ route('dashboard.tours.destroy', $tour) }}" style="display: inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de querer eliminar este tour?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>


@endpush
