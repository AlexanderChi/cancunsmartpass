<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('dashboard.populartours.create') }}" class="needs-validation" novalidate>
        {{-- @csrf --}}
        {{ csrf_field() }}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresa Titulo del nuevo tour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group position-relative ">
                        {{-- <label for="nombre">Título del Tour español</label> --}}
                        <input type="text"
                                name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                placeholder="Ingresa el titulo del tour"
                                aria-describedby="helpId"
                                required
                                autocomplete="nombre"
                                autofocus
                                value="{{ old('nombre') }}">

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary">Crear Tour</button>
                </div>
            </div>
        </div>
    </form>
</div>
