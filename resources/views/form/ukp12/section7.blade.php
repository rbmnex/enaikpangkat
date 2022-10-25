<div id="pertubuhan-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 6 - Jawatan Yang Dipegang Dalam Pertubuhan/Lain-Lain </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-calon" data-toggle="modal" data-target="#modal-pertubuhan"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Jawatan</th>
                    <th>Nama Pertubuhan</th>
                    <th>Tahun</th>
                    <th>Tindakan</th>
                </thead>
                <tbody id="tbody-badan">
                @foreach ($profile['pertubuhan'] as $org)
                    <tr data-pertubuhan-id="{{ $org->id }}">
                        <td>{{ $org->jawatan }}</td>
                        <td>{{ $org->nama }}</td>
                        <td>{{ $org->tahun }}</td>
                        <td><button type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-org"><i data-feather='trash-2'></i> Hapus</button></td>
                    </tr>
                @endforeach
                @if($profile['pertubuhan']->count() == 0)
                <tr data-pertubuhan-id="">
                    <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                </tr>


                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <br/>
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary btn-prev">
            <i data-feather="arrow-right" class="align-middle mr-sm-25 mr-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
