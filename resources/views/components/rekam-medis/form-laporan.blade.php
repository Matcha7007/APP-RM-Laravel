@extends('layout.content')
@section('show-analis-menu', 'active')
@section('show-laporan', 'active')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <form action="/unduh/data-rm/harian">
                <div class="form-group col-8">
                    <label for="">Harian</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" 
                        class="form-control datetimepicker-input" 
                        data-target="#reservationdate" name="harian"  
                        value="{{ request('harian') }}">
                        {{-- data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask/ --}}
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="input-group-append ml-2">
                    <button class="btn btn-success" type="submit">
                        <i class="nav-icon fas fa-download"></i>
                        Unduh Laporan
                    </button>
                </div>   
            </form>
        </div>
        <div class="col-4">
            <form action="/unduh/data-rm/bulanan">
                <div class="form-group col-8">
                    <label for="">Bulanan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" 
                        id="reservation" name="bulanan" 
                        value="{{ request('bulanan') }}">
                    </div>
                </div>
                <div class="input-group-append ml-2">
                    <button class="btn btn-success" type="submit">
                        <i class="nav-icon fas fa-download"></i>
                        Unduh Laporan
                    </button>
                </div>   
            </form>
        </div>
        <div class="col-4">
            <form action="/unduh/data-rm/tahunan">
                <div class="form-group col-8">
                    <label for="">Tahunan</label>
                    <div class="input-group date" id="tahundate" data-target-input="nearest">
                        <input type="text" 
                        class="form-control datetimepicker-input" 
                        data-target="#tahundate" name="tahunan"  
                        value="{{ request('tahunan') }}">
                        <div class="input-group-append" data-target="#tahundate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="input-group-append ml-2">
                    <button class="btn btn-success" type="submit">
                        <i class="nav-icon fas fa-download"></i>
                        Unduh Laporan
                    </button>
                </div>   
            </form>
        </div>
    </div>
</div>
@endsection

<script>
// $(document).ready(function(){
//   $("#tahunan").datepicker({
//      format: "yyyy",
//      viewMode: "years", 
//      minViewMode: "years",
//      autoclose:true
//   });   
// })
// $(function () {
//     $('#datetahun').datetimepicker({
//         format: "yyyy",
//         viewMode: "years", 
//         minViewMode: "years",
//         autoclose:true
//     });
// })
</script>
