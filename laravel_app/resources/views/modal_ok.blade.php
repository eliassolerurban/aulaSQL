@extends('units_alumno')
@section('modal_ok')
<h1>vmkdmlmdfklmdfklmdflkm</h1>    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#modal_ok').modal('show');
        });
    </script>

    <div class="modal" role="dialog" id="modal_ok">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¡Correcto!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    @endsection
