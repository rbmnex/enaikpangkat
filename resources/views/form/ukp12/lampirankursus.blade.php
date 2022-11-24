<div id="per-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 1 -Kursus dan Seminar yang telah Dihadiri </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-calon" data-toggle="modal" data-target="#modal-kursus"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Kursus</th>
                    <th>Tarikh Mula</th>
                    <th>Tarikh Tamat</th>
                    <th>Tempat</th>
                    <th>Tindakan</th>
                </thead>
                <tbody id="tbody-badan-kursus">
                {{-- @foreach ($lampirankursus as $org)
                    <tr data-kursus-id="{{ $org->id }}">
                        <td>{{ $org->nama_kursus }}</td>
                        <td>{{ $org->tkh_mula }}</td>
                        <td>{{ $org->tkh_tamat }}</td>
                         <td>{{ $org->tempat }}</td>
                        <td><button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-kursus"><i data-feather='trash-2'></i> Hapus</button></td>
                    </tr>
                @endforeach
                @if($lampirankursus->count() == 0) --}}
                <tr data-kurusu-id="">
                    <td colspan="5" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                </tr>
                {{-- @endif
                </tbody> --}}
            </table>
        </div>
    </div>
    <br/>
    <br/>

</div>
