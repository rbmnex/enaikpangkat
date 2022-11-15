<div id="profesional-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 8 - Rekod Kelayakkan Profesional Dan Pendaftaran Dengan Badan Profesional</h5>
        <small class="text-notice">Sila kemas kini di bahagian KELULUSAN/KOMPETENSI/SUMBANGAN di portal MyKj jika ada perubahan </small>
    </div>
    <div class="row">
        {{-- <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-profesional" data-toggle="modal" data-target="#modal-profesional"><i data-feather='plus'></i>Tambah</button>
        </div> --}}
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Bil.</th>
                    <th>Kelayakkan Profesional / Pendaftaran Dengan Badan
                        Profesional</th>
                    <th>Badan Profesional Yang Diiktiraf</th>
                    <th>No. Pendaftaran</th>
                    <th>Tahun</th>
                </thead>
                <tbody id="tbody-profesional">
                @foreach ($profile['profesional'] as $pro)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pro->nama_kelulusan }}</td>
                        <td>{{ $pro->institusi }}</td>
                        <td>{{ $pro->no_pendaftaran }}</td>
                        <td>{{ empty($pro->tkh_kelulusan) ? '' : \Carbon\Carbon::parse($pro->tkh_kelulusan)->format('Y') }}</td>
                    </tr>
                @endforeach
                @if($profile['profesional']->count() == 0)
                <tr data-profesional-id="">
                    <td colspan="5" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
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
