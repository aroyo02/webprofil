@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
     {{-- Notifikasi Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Visi</h2>
    <form id="formVisi" action="{{ $vision ? route('admin.visi.update', $vision->id) : route('admin.visi.store') }}" method="POST">
        @csrf
        @if($vision)
            @method('PUT')
        @endif
        <textarea id="textareaVision" name="vision" rows="4" class="form-control">{{ old('vision', $vision->content ?? '') }}</textarea>
        <br>
        <button type="submit" class="btn {{ $vision ? 'btn-primary' : 'btn-success' }}">
            {{ $vision ? 'Update Visi' : 'Tambah Visi' }}
        </button>
    </form>
    
    <hr>

    <h2>Misi</h2>
    <form id="formMisi" action="{{ $mission ? route('admin.misi.update', $mission->id) : route('admin.misi.store') }}" method="POST">
        @csrf
        @if($mission)
            @method('PUT')
        @endif
        <textarea id="textareaMission" name="mission" rows="4" class="form-control">{{ old('mission', $mission->content ?? '') }}</textarea>
        <br>
        <button type="submit" class="btn {{ $mission ? 'btn-primary' : 'btn-success' }}">
            {{ $mission ? 'Update Misi' : 'Tambah Misi' }}
        </button>
    </form>

    <hr>

    <form id="saveAllForm" action="{{ route('admin.visimisi.saveAll') }}" method="POST">
        @csrf
        <input type="hidden" name="vision" id="hiddenVision">
        <input type="hidden" name="mission" id="hiddenMission">
        <button type="submit" class="btn btn-success float-end" id="saveAllButton" disabled>Simpan Semua</button>
    </form>

    <div class="clearfix"></div>

    
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const textareaVision = document.getElementById('textareaVision');
    const textareaMission = document.getElementById('textareaMission');
    const hiddenVision = document.getElementById('hiddenVision');
    const hiddenMission = document.getElementById('hiddenMission');
    const saveAllButton = document.getElementById('saveAllButton');
    const saveAllForm = document.getElementById('saveAllForm');

    function checkInputs() {
        const visionFilled = textareaVision.value.trim() !== '';
        const missionFilled = textareaMission.value.trim() !== '';
        saveAllButton.disabled = !(visionFilled && missionFilled);
    }

    saveAllForm.addEventListener('submit', function(e) {
        if (textareaVision.value.trim() === '' || textareaMission.value.trim() === '') {
            e.preventDefault();
            alert('Harap isi kedua form sebelum menyimpan.');
            return;
        }

        hiddenVision.value = textareaVision.value;
        hiddenMission.value = textareaMission.value;
    });

    document.getElementById('formVisi').addEventListener('submit', function(e) {
        if (textareaVision.value.trim() === '') {
            e.preventDefault();
            alert('Harap isi visi terlebih dahulu.');
        }
    });

    document.getElementById('formMisi').addEventListener('submit', function(e) {
        if (textareaMission.value.trim() === '') {
            e.preventDefault();
            alert('Harap isi misi terlebih dahulu.');
        }
    });

    textareaVision.addEventListener('input', checkInputs);
    textareaMission.addEventListener('input', checkInputs);

    // Inisialisasi pertama
    checkInputs();
});
</script>

{{-- Inisialisasi Summernote --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        $('#textareaVision, #textareaMission').summernote({
            height: 300,
            placeholder: 'Tulis isi profil sekolah di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link',]],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endsection
