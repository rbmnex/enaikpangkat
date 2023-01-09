<div id="per-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Bahagian 1 -Kursus dan Seminar yang telah Dihadiri 3 tahun terkini </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-kursus" data-toggle="modal" data-target="#modal-kursus"><i data-feather='plus'></i>Tambah</button>
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
                 @foreach ($lampirankursus as $org)
                    <tr data-kursus-id="{{ $org->id }}">
                        <td>{{ $org->nama_kursus }}</td>
                        <td>{{ date('d-m-Y', strtotime($org->tkh_mula)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($org->tkh_tamat)) }}</td>
                         <td>{{ $org->tempat }}</td>
                        <td><button title="Hapus" type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-kursus"><i data-feather='trash-2'></i></button>
                        <button  title="Kemaskini" type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-kursus"  data-toggle="modal" data-target="#modal-kursus"><i data-feather='check-square'></i></button></td>
                    </tr>
                @endforeach
                 @if($lampirankursus->count() == 0) 
                <tr data-kursus-id="" class="kursus-no-data">
                    <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                </tr>


                @endif
              
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <br/>

</div>
