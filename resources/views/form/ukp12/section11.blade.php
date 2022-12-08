<div id="iktiraf-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 10 - Pengiktirafan</h5>
        <small class="text-notice">Sila kemas kini di modul PERISTIWA di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        {{-- <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-iktiraf" data-toggle="modal" data-target="#modal-kompeten"><i data-feather='plus'></i>Tambah</button>
        </div> --}}
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Bil.</th>
                    <th>Pengiktirafan</th>
                    <th>Tahun</th>
                </thead>
                <tbody id="tbody-iktiraf">
                @foreach ($profile['pengiktirafan'] as $sijil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sijil->jenis->peristiwa ?? '' }}</td>
                        <td>{{ empty($sijil->tkh_mula_peristiwa) ? '' : \Carbon\Carbon::parse($sijil->tkh_mula_peristiwa)->format('Y') }}</td>
                    </tr>
                @endforeach
                @if($profile['pengiktirafan']->count() == 0)
                <tr data-pengiktirafan-id="">
                    <td colspan="4" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
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
            <span class="align-middle d-sm-inline-block d-none">Sebelum</span>
        </button>
        <button type="button" class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Selanjutnya</span>
            <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
        </button>
    </div>
</div>
