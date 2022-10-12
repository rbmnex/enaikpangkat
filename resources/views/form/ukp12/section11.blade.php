<div id="iktiraf-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 11 - Pengiktirafan</h5>
    </div>
    <div class="row">
        {{-- <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-iktiraf" data-toggle="modal" data-target="#modal-kompeten"><i data-feather='plus'></i>Tambah</button>
        </div> --}}
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Pengiktirafan</th>
                    <th>Tahun</th>
                </thead>
                <tbody id="tbody-iktiraf">
                @foreach ($profile['pengiktirafan'] as $sijil)
                    <tr>
                        <td>{{ $sijil->jenis->peristiwa ?? '' }}</td>
                        <td>{{ empty($sijil->tkh_mula_peristiwa) ? '' : \Carbon\Carbon::parse($sijil->tkh_mula_peristiwa)->format('Y') }}</td>
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
