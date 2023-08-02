@extends('adminlte::page')

@section('title', 'Evento')

@section('js')

    <!-- Código del FullCalendar -->
    <script src='{{ asset('fullcalendar/core/index.global.js') }}'></script>
    <script src='{{ asset('fullcalendar/daygrid/index.global.js') }}'></script>
    <script src='{{ asset('fullcalendar/interaction/index.global.js') }}'></script>

    <!-- Plugins (Funcionalidades adicionales) -->
    <script src='{{ asset('fullcalendar/list/index.global.js') }}'></script>
    <script src='{{ asset('fullcalendar/timegrid/index.global.js') }}'></script>

    <!-- Plugins (Para los modal sino no funcionan) -->
    <!--<script src='{{ asset('fullcalendar/js/jquery-3.7.0.min.js') }}'></script> -->
    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: new Date(2023, 6, 11),
                initialView: 'dayGridMonth',

                editable: true,
                selectable: true,
                aspectRatio: 1.8,
                scrollTime: '00:00',

                headerToolbar: {
                    left: 'promptResource miBoton today prev,next',
                    center: 'title',
                    right: 'timeGridDay,listWeek,timeGridWeek,dayGridMonth'
                },

                customButtons: {
                    promptResource: {
                        text: '+ Sala',
                        click: function() {
                            var title = prompt('Nombre sala');
                            if (title) {
                                calendar.addResource({
                                    title: title
                                });
                            }
                        }
                    },
                    miBoton: {
                        text: 'Mi botón',
                        click: function() {
                            alert('¡Hola mundo!');
                            $('#exampleModal').modal('show');
                        }
                    }

                },
                dateClick: function(info) {

                    limpiarFormulario();
                    $('#txtFecha').val(info.dateStr);
                    $('#exampleModal').modal('show');

                    /*calendar.addEvent({
                        title: "Evento x",
                        date: info.dateStr
                    });*/
                },
                eventClick: function(info) {
                    console.log(info);
                    console.log(info.event.title);

                    console.log(info.event.start);

                    console.log(info.event.end);
                    console.log(info.event.textColor);
                    console.log(info.event.backgroundColor);

                    //Información adicional
                    console.log(info.event.extendedProps.descripcion);

                    $('#txtID').val(info.event.id);
                    $('#txtTitulo').val(info.event.title);

                    mes = (info.event.start.getMonth()+1);
                    dia =(info.event.start.getDate());
                    anno =(info.event.start.getFullYear());

                    mes = (mes<10)?"0"+mes:mes;
                    dia = (dia<10)?"0"+dia:dia;

                    minutos = info.event.start.getMinutes();
                    hora = info.event.start.getHours();

                    minutos = (minutos<10)?"0"+minutos:minutos;
                    hora = (hora<10)?"0"+hora:hora;

                    horario =(hora+":"+minutos);

                    $('#txtFecha').val(anno+"-"+mes+"-"+dia);
                    $('#txtHora').val(horario);
                    $('#txtColorTexto').val(info.event.textColor);
                    $('#txtColor').val(info.event.backgroundColor);

                    $('#txtDescripcion').val(info.event.extendedProps.descripcion);

                    $('#exampleModal').modal('show');

                },
                /*events: [{
                        title: 'Mi evento 1',
                        start: "2023-06-09 12:30:00",
                        descripcion: "Descripción del evento 1"
                    },
                    {
                        title: 'Mi evento 2',
                        start: "2023-06-10 12:30:00",
                        end: "2023-06-14 12:30:00",
                        color: "#FFCCAA",
                        textColor: "#000000",
                        descripcion: "Descripción del evento 2"
                    }
                ]*/
                events:"{{ url('/evento/show') }}"

            });
            calendar.setOption('locale', 'Es');
            calendar.render();

            $('#btnAgregar').click(function(){
                objEvento = recolectarDatosGUI("POST");
                EnviarInformacion('',objEvento);
            });
            $('#btnEliminar').click(function(){
                objEvento = recolectarDatosGUI("DELETE");
                EnviarInformacion('/'+$('#txtID').val(),objEvento);
            });
            $('#btnModificar').click(function(){
                objEvento = recolectarDatosGUI("PATCH");
                EnviarInformacion('/'+$('#txtID').val(),objEvento);
            });

            function recolectarDatosGUI(method){
                nuevoEvento = {
                    id:$('#txtID').val(),
                    title:$('#txtTitulo').val(),
                    descripcion:$('#txtDescripcion').val(),
                    color:$('#txtColor').val(),
                    textColor: $('#txtColorTexto').val(),

                    start:$('#txtFecha').val()+" "+$('#txtHora').val(),
                    end:$('#txtFecha').val()+" "+$('#txtHora').val(),
                    '_token':$("meta[name='csrf-token']").attr("content"),
                    '_method':method
                }
                return nuevoEvento;
            }
            function EnviarInformacion(accion,objEvento){
                $.ajax({
                    type:"POST",
                    url:"{{ url('/evento') }}"+accion,
                    data: objEvento,
                    success:function(msg){
                        console.log(msg);
                        $('#exampleModal').modal('toggle');
                        calendar.refetchEvents();

                    },
                    error: function(){
                        alert("Hay un error");
                    }
                });

            }
            function limpiarFormulario(){
                    $('#txtID').val("");
                    $('#txtTitulo').val("");
                    $('#txtFecha').val("");
                    $('#txtHora').val("07:00");
                    $('#txtColorTexto').val("");
                    $('#txtColor').val("");
                    $('#txtDescripcion').val("");
            }

        });
    </script>
@endsection

@section('content')
    <br />
    <div class="row">
        <div class="col"> </div>
        <div class="col-10">
            <div id="calendar" class="col-centered">
            </div>
        </div>
        <div class="col"> </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="d-none">
                        <div class="form row">
                        <div class="form-group col-md-8">
                            <label>ID:</label>
                            <input type="text" class="form-control" name="txtID" id="txtID">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fecha:</label>
                            <input type="text" class="form-control" name="txtFecha" id="txtFecha">
                        </div>
                        </div>
                    </div>
                <div class="form row">


                    <div class="form-group col-md-8">
                        <label>Título:</label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Hora:</label>
                        <input type="time" min="07:00" max="19:00" step="600" class="form-control" name="txtHora" id="txtHora">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Descripción:</label>
                        <textarea name="txtDescripcion" class="form-control" id="txtDescripcion" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Color:</label>
                        <input type="color" class="form-control" name="txtColor" id="txtColor">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Color del Texto:</label>
                        <input type="color" class="form-control" name="txtColorTexto" id="txtColorTexto">
                    </div>
                </div>



                </div>
                <div class="modal-footer">
                    <button id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button id="btnModificar" class="btn btn-warning">Modificar</button>
                    <button id="btnEliminar" class="btn btn-danger">Eliminar</button>
                    <button id="btnCancelar" data-bs-dismiss="modal" class="btn btn-default">Cancelar</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0" >
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) by Lázaro Arias
    Acea
</div>
@stop
