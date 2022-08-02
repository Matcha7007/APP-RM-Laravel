<div class="row">
    @foreach ($polis as $poli)      
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon"><i class="bi bi-person-badge"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ $poli->name }}</span>
                    <span class="info-box-number">{{ $poli->kunjungans->count() }} dari 50</span>
                </div>
                @if(Auth::user())
                <a class="badge badge-outline-info mt-auto" href="/loket-pendaftaran/{{ $poli->id }}" data-toggle="tooltip" data-placement="top" title="Daftar ke poli {{ $poli->name }}">
                    <i class="bi bi-caret-right-fill"></i>
                </a>
                @endif
            </div>
            {{-- <span class="info-box-icon"><i class="bi bi-person-badge"></i></span> --}}
        </div>
    @endforeach
</div>
<style>
    .info-box-icon {
        box-shadow: inset 0 0 0 0 #54b3d6;
        color: #54b3d6;
        margin: 0 -.25rem;
        padding: 0 .25rem;
        transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
    }
    .info-box-icon:hover {
        box-shadow: inset 100px 0 0 0 #54b3d6;
        color: white;
    }
</style>