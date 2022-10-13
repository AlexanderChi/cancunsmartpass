@extends('admin.layout')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear Tours</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.tours.index') }}">Tours</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('dashboard.populartours.update', $tourspopular) }}" class="needs-validation" >
    {{-- @csrf --}}
    {{ csrf_field() }} {{ method_field('PUT') }}
    <div class="card m-4">
        <div class="row m-2">
            {{-- ---- Columna Español ----- --}}
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="box-title">Tour en Español</h4>
                    </div>
                    <div class="card-body">
                            <div class="form-group position-relative ">
                                <label for="nombre">Título del Tour</label>
                                <input type="text"
                                        name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                        placeholder="Ingresa el titulo del tour"
                                        aria-describedby="helpId"
                                        required
                                        autocomplete="nombre"
                                        autofocus
                                        value="{{ old('nombre', $tour->nombre) }}">

                                    @error('nombre')
                                        {{-- <span class="invalid-tooltip" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> --}}
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                          </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 50 caracteres</small>
                            </div>

                            <div class="form-group position-relative ">
                                <label for="descripcion">Descripcion</label>
                                <textarea type="text"
                                        name="descripcion"
                                        class="form-control @error('descripcion') is-invalid @enderror"
                                        placeholder="Ingresa Descripcion del tour"
                                        aria-describedby="helpId"
                                        rows="5"
                                        required
                                        autocomplete="descripcion"
                                        autofocus>
                                        {{ old('descripcion', $tour->desc) }}
                                </textarea>
                                    @error('descripcion')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 300 caracteres</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group position-relative">
                                <label for="incluye">Que incluye</label>
                                <textarea type="text"
                                        name="incluye"
                                        class="form-control @error('incluye') is-invalid @enderror"
                                        aria-describedby="helpId"
                                        id="editor"
                                        required
                                        autocomplete="incluye"
                                        autofocus>
                                        {{ old('incluye', $tour->incluye) }}
                                </textarea>
                                    @error('incluye')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 300 caracteres</small>
                            </div><hr>

                            <div class="form-group position-relative">
                                <label for="pickup">Punto de encuentro</label>
                                <textarea type="text"
                                        id="editor2"
                                        name="pickup"
                                        class="form-control @error('pickup') is-invalid @enderror"
                                        required
                                        autocomplete="pickup"
                                        autofocus>
                                        {{ old('pickup', $tour->pickup) }}
                                </textarea>
                                    @error('pickup')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 1000 caracteres</small>
                            </div><hr>

                            <div class="form-group position-relative">
                                <label for="recomendacion">Recomendaciones</label>
                                <textarea type="text"
                                        id="editor3"
                                        name="recomendacion"
                                        class="form-control @error('recomendacion') is-invalid @enderror"
                                        required
                                        autocomplete="recomendacion"
                                        autofocus>
                                        {{ old('recomendacion', $tour->recomendacion) }}
                                </textarea>
                                    @error('recomendacion')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 250 caracteres</small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h6>Informacion Adicional</h6>
                            </div>
                            <div class="form-group position-relative">
                                <label for="extra">Informacion Extra</label>
                                <textarea type="text"
                                        id="editor4"
                                        name="extra"
                                        class="form-control @error('extra') is-invalid @enderror"
                                        required
                                        autocomplete="extra"
                                        autofocus>
                                        {{ old('extra', $tour->extra) }}
                                </textarea>
                                    @error('extra')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 500 caracteres</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- -- ---- Columna Ingles ----- -- --}}

                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="box-title">Tour en Ingles</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label for="name">Tour Title</label>
                                <input type="text"
                                        name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $tour->name) }}"
                                        placeholder="Ingresa el titulo del tour"
                                        aria-describedby="helpId"
                                        required
                                        autocomplete="name"
                                        autofocus>
                                    @error('name')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 50 caracteres</small>
                            </div>

                            <div class="form-group position-relative">
                                <label for="desc_eng">Description</label>
                                <textarea type="text"
                                        name="desc_eng"
                                        class="form-control @error('desc_eng') is-invalid @enderror"
                                        placeholder="Ingresa Descripcion del tour"
                                        aria-describedby="helpId"
                                        rows="5"
                                        required
                                        autocomplete="desc_eng"
                                        autofocus>
                                        {{ old('desc_eng', $tour->desc_eng) }}
                                </textarea>
                                    @error('desc_eng')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 300 caracteres</small>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label for="incluye_eng">Including</label>
                                <textarea type="text"
                                        id="editor5"
                                        name="incluye_eng"
                                        class="form-control @error('incluye_eng') is-invalid @enderror"
                                        required
                                        autocomplete="incluye_eng"
                                        autofocus>
                                        {{ old('incluye_eng', $tour->incluye_eng) }}
                                </textarea>
                                    @error('incluye_eng')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 300 caracteres</small>
                            </div>
                            <hr>

                            <div class="form-group position-relative">
                                <label for="pickup_eng">Meeting point</label>
                                <textarea type="text"
                                        id="editor6"
                                        name="pickup_eng"
                                        class="form-control @error('pickup_eng') is-invalid @enderror"
                                        required
                                        autocomplete="pickup_eng"
                                        autofocus>
                                        {{ old('pickup_eng', $tour->pickup_eng) }}
                                </textarea>
                                    @error('pickup_eng')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 450 caracteres</small>
                            </div>
                            <hr>

                            <div class="form-group position-relative">
                                <label for="recomendacion_eng">Recommendations</label>
                                <textarea type="text"
                                        id="editor7"
                                        name="recomendacion_eng"
                                        class="form-control @error('recomendacion_eng') is-invalid @enderror"
                                        required
                                        autocomplete="recomendacion_eng"
                                        autofocus>
                                        {{ old('recomendacion_eng', $tour->recomendacion_eng) }}
                                </textarea>
                                    @error('recomendacion_eng')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small id="helpId" class="text-muted">máximo 250 caracteres</small>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h6>Additional Information</h6>
                            </div>
                            <div class="form-group position-relative">
                                <label>Información extra en inglés</label>
                                <textarea name="extra_eng"
                                        class="form-control @error('extra_eng') is-invalid @enderror"
                                        id="editor8"
                                        maxlength="500"
                                        required
                                        autocomplete="extra_eng"
                                        autofocus>
                                        {{ old('extra_eng', $tour->extra_eng) }}
                                </textarea>
                                    @error('extra_eng')
                                        <div class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small>Máximo 500 caracteres</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label>Precio adulto(USD)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('PRAD') is-invalid @enderror"
                                        value="{{ old('PRAD', $tour->PRAD) }}"
                                        name="PRAD"
                                        required
                                        autocomplete="PRAD"
                                        autofocus>

                                        @error('PRAD')
                                            <div class="invalid-tooltip">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <small id="helpId" class="text-muted">Ingresar solo numeros</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label>Precio menor (USD)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('PRMD') is-invalid @enderror"
                                        value="{{ old('PRMD', $tour->PRMD) }}"
                                        name="PRMD"
                                        required
                                        autocomplete="PRMD"
                                        autofocus>

                                        @error('PRMD')
                                            <div class="invalid-tooltip">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <small id="helpId" class="text-muted">Ingresar solo numeros</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label>Modalidad</label>
                                <select class="form-control @error('paquete') is-invalid @enderror"
                                        name="paquete"
                                        required
                                        autocomplete="paquete"
                                        autofocus>
                                    <option value="">Selecciona tipo de Modalidad</option>
                                    @foreach ($paquete as $modalidad => $paq)
                                        <option value="{{ $paq }}
                                                " {{ old('paquete', $tour->paquete) == $paq ? 'selected' : ''}}>
                                                {{ $paq }}
                                            </option>
                                    @endforeach
                                    {{-- <option value="Individual">Individual</option>
                                    <option value="Pareja">Pareja</option> --}}
                                </select>
                                @error('paquete')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label >Categoría</label>
                                <select name="category"
                                        class="form-control select2 @error('category') is-invalid @enderror"
                                        data-placeholder="Seleccione Catogorías"
                                        style="width: 100%;"
                                        required
                                        autocomplete="category"
                                        autofocus>
                                    <option value="">Selecciona una categoría</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category', $tour->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->nombre }}
                                            </option>
                                        @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label for="destinations">Destinos</label>
                                <select name="destinations[]"
                                        class="form-control select2 @error('destinations') is-invalid @enderror"
                                        value=""
                                        multiple="multiple"
                                        data-placeholder="Seleccione destinos"
                                        style="width: 100%;"
                                        required
                                        autocomplete="destinations"
                                        autofocus>
                                    <option value="">Selecciona destinos</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}"
                                            {{ collect(old('destinations', $tour->destinations->pluck('id')))->contains($destination->id) ? 'selected' : '' }}>
                                            {{ $destination->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('destinations')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label>Tipo de cambio</label>
                                <select class="form-control  @error('change') is-invalid @enderror"
                                        name="change"
                                        data-placeholder="Seleccione tipo de cambio"
                                        style="width: 100%;"
                                        required
                                        autocomplete="change"
                                        autofocus>
                                    <option value="">Selecciona el tipo de cambio</option>
                                    @foreach ($typechange as $change)
                                        <option value="{{ $change->id }}"
                                            {{ old('change', $tour->tipo_cambios_id) == $change->id ? 'selected' : '' }}>
                                            {{ $change->titulo }} ( ${{ $change->valor }} MXN)
                                    </option>
                                    @endforeach
                                </select>
                                @error('change')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label>Status</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                        name="status"
                                        required
                                        autocomplete="status"
                                        autofocus>
                                    <option value="">Selecciona status</option>
                                    @foreach ($status as $status => $stat)
                                        <option value="{{ $stat }}
                                                " {{ old('status', $tour->status) == $stat ? 'selected' : ''}}>
                                                {{ $stat }}
                                            </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group position-relative">
                                <label for="">Link de Youtube</label>
                                <input type="text" name="youtube" id="" class="form-control"
                                    placeholder="Ingresar link de video" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">máximo 50 caracteres</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image">Subir Imagen</label>
                                <div class="dropzone" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group m-4">
                <button type="submit" class="btn btn-success btn-large"> Guardar Tour</button>
            </div>
        </div>
</form>
@if($tour->photos->count())
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                @foreach ($tourspopular->photos as $photo)
                    {{-- <form method="POST" action="{{ route('dashboard.photos.destroy', $photo) }}"> --}}
                    <form action="{{ route('dashboard.photos.destroy', $photo) }}" method="POST">
                        @csrf
                        @method('delete')

                        {{-- <button class="btn btn-danger btn-xs" style="position: absolute" type="submit" onclick="return confirm('Are you sure you want to delete this?');"> --}}
                        <button class="btn btn-danger btn-xs" style="position: absolute" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                        <img class="img-responsive" src="{{ url($photo->url) }}" >
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endif

@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- Dropzone -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/min/dropzone.min.css') }}">

    @endpush
@push('scripts')
    <!-- Dropzone -->
    <script src="{{ asset('admin/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script>
        var myDropzone = new Dropzone('.dropzone', {
                url: '/dashboard/populartours/{{ $populartours->url }}/photos',
                paramName: 'photo',
                acceptedFiles: 'image/*',
                maxFilesize: 2,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dictDefaultMessage: 'Arrastra aqui las fotos para subirlas'
            });

            //myDropzone.on('error', function(file, response){
              //  var msg = response.errors.photo[0];
                //$('.dz-error-message:last > span').text(msg);
           // });


        Dropzone.autoDiscover = false;
    </script>
@endpush

