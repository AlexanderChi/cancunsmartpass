@extends('layouts.app')

@section('content')
    <section class="inner-banner">
        <div class="w3l-teams-32-main w3l-index-block4 mb-5" >
            <div class="w3l-breadcrumb">
                <div class="features-bg">
                    <div class="container">
                        <h3 class="mb-sm-4 mb-3 title " style="color: #DA0071; font-weight: bold">
                            PREGUNTAS FRECUENTES
                        </h3>
                        {{-- <div class="faq-accordion" id="accordionExample">
                            <div class="faqs-container">
                                <div class="faq-container activo" data-faqs="para-que-sirve">
                                    <p class="faq">¿Cómo funciona CancunPass?  <i class="fa fa-plus"></i></p>
                                    <p class="reply">CancunPass es una membresía que te permite comprar tus actividades con hasta el 70% de descuento.
                                        El itinerario ideal de actividades para estas vacaciones está en tus manos.
                                        </p>
                                </div>
                                <div class="faq-container" data-faqs="vigencia">
                                    <p class="faq">¿Cuanto tiempo de vigencia tiene el CancunPass? <i class="fa fa-plus"></i></p>
                                    <p class="reply">Funciona como una membresía que te permite comprar tus actividades o tours en cancun a precios de lista. Obtienes ofertas en donde puedes obtener hasta un 70% de descuento. Ya no dependas de agencias de viajes para agendar un itinerario de vacaciones cuando puedes hacerlo tu mismo y ahorrar al máximo. de descuento. Ya no dependas de agencias de viajes para agendar un itinerario de vacaciones cuando puedes hacerlo tu mismo y ahorrar al máximo.de descuento. Ya no dependas de agencias de viajes para agendar un itinerario de vacaciones cuando puedes hacerlo tu mismo y ahorrar al máximo</p>
                                </div>
                                <div class="faq-container" data-faqs="otros">
                                    <p class="faq">¿Para que sirve CancunPass? <i class="fa fa-plus"></i></p>
                                    <p class="reply">Funciona como una membresía que te permite comprar tus actividades o tours en cancun a precios de lista. Obtienes ofertas en donde puedes obtener hasta un 70% de descuento. Ya no dependas de agencias de viajes para agendar un itinerario de vacaciones cuando puedes hacerlo tu mismo y ahorrar al máximo</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="accordion text-left" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <strong>¿Cómo funciona CancunPass?</strong>
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    CancunPass es una membresía que te permite comprar tus actividades con hasta el 70% de descuento.
                                    El itinerario ideal de actividades para estas vacaciones está en tus manos.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <strong>¿Cuanto tiempo de vigencia tiene el CancunPass?</strong>

                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    El CancunPass tiene una vigenvia de 7 días a partir del día que inicia tus actividades, tienes has 1 año, para poder usar tu CancunPass
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endpush
