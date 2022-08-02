@extends('templates.main')

@section('form')
    <div class="container">
        <h1 class="featurette-heading">RSAU Dr. <span class="text-muted">M Salamun</span></h1>
        <h2 class="text-info">Data Rekam Medis</h2>
        <hr>
        <div class="ml-4">
            @include('components.rekam-medis.template-single')
        </div>
        <hr>
        <div>
            Bandung, {{ date('j F Y') }} <br>
            Bagian Rekam Medis,<br><br><br>
            {{ Auth::user()->name }}
        </div>
    </div>
@endsection

<script type="text/javascript">
    window.print();
</script>