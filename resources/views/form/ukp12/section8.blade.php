<div id="akademik-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 8 - Rekod Akademik</h5>
    </div>
    <div class="row">
        {{-- <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-calon" data-toggle="modal" data-target="#modal-akademik"><i data-feather='plus'></i>Tambah</button>
        </div> --}}
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Kelulusan</th>
                    <th>Institut Pusat Pengajian Tinggi</th>
                    <th>Tahun</th>
                    {{-- <th>Aksi</th> --}}
                </thead>
                <tbody id="tbody-universiti">
                @foreach ($profile['akademik'] as $a)
                    <tr>
                        <td>{{ $a->nama_kelulusan }}</td>
                        <td>{{ $a->institusi }}</td>
                        <td>{{ empty($a->tkh_kelulusan) ? '' : \Carbon\Carbon::parse($a->tkh_kelulusan)->format('Y') }}</td>
                    </tr>
                @endforeach
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
