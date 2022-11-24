<div id="projek-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 3 - Senarai Projek beserta kos (Minimum 4 projek, <b>Maksimum 10 projek</b>)<br>(sekiranya banyak projek yang diselia,mohon senaraikan yang berprofile tinggi sahaja) </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-calon" data-toggle="modal" data-target="#modal-projek"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Projek</th>
                    <th>Kos</th>
                    <th>Tindakan</th>
                </thead>
                <tbody id="tbody-badan-projek">
                {{-- @foreach ($lampiranprojek as $org)
                    <tr data-projek-id="{{ $org->id }}">
                        <td>{{ $org->nama_projek }}</td>
                        <td> RM{{ number_format($org->kos_projek, 2) }}</td>
                        <td><button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-projek"><i data-feather='trash-2'></i> Hapus</button></td>
                    </tr>
                @endforeach
                @if($lampiranprojek->count() == 0) --}}
                <tr data-projek-id="">
                    <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                </tr>

{{--
                @endif --}}
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <br/>

</div>
