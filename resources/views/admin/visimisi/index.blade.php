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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#textareaVision, #textareaMission').summernote({
            height: 300,
            placeholder: 'Tulis isi di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        });

        const saveAllButton = document.getElementById('saveAllButton');
        const hiddenVision = document.getElementById('hiddenVision');
        const hiddenMission = document.getElementById('hiddenMission');

        function checkInputs() {
            const visionContent = $('#textareaVision').summernote('code').replace(/<[^>]+>/g, '').trim();
            const missionContent = $('#textareaMission').summernote('code').replace(/<[^>]+>/g, '').trim();

            saveAllButton.disabled = !(visionContent && missionContent);
        }

        $('#textareaVision').on('summernote.change', checkInputs);
        $('#textareaMission').on('summernote.change', checkInputs);

        // Submit Save All
        $('#saveAllForm').on('submit', function(e) {
            const vision = $('#textareaVision').summernote('code').trim();
            const mission = $('#textareaMission').summernote('code').trim();

            if (!vision || !mission) {
                e.preventDefault();
                alert('Harap isi kedua form sebelum menyimpan.');
                return;
            }

            hiddenVision.value = vision;
            hiddenMission.value = mission;
        });

        // Submit Visi dan Misi individual
        $('#formVisi').on('submit', function(e) {
            const content = $('#textareaVision').summernote('code').replace(/<[^>]+>/g, '').trim();
            if (!content) {
                e.preventDefault();
                alert('Harap isi visi terlebih dahulu.');
            }
        });

        $('#formMisi').on('submit', function(e) {
            const content = $('#textareaMission').summernote('code').replace(/<[^>]+>/g, '').trim();
            if (!content) {
                e.preventDefault();
                alert('Harap isi misi terlebih dahulu.');
            }
        });

        // Inisialisasi awal
        checkInputs();
    });
</script>
@endpush
@endsection
