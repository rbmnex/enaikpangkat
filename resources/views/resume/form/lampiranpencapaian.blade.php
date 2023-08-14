<div id="pencapaian-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Lampiran 5 - Senarai Pencapaian Tertinggi<br>
            <ul>
                <li>Sekurangnya satu item dan perlu dalam bentuk ayat penuh, contoh : Pakar di dalam kejuruteraan jalan dan jambatan dan merupakan pakar rujuk jabatan bagi isu-isu berkenaan reka bentuk dan pembinaan jalan.</li>
                <li>Sila tekan "Tambah" untuk senarai pencapaian seterusnya.</li>
            </ul>
         </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-pencapaian" data-toggle="modal" data-target="#modal-pencapaian"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Senarai Pencapaian Tertinggi</th>
                     <th>Tindakan</th>
                </thead>
                <tbody id="tbody-badan-pencapaian">
                @foreach ($lampiranpencapaian as $org)
                    <tr data-pencapaian-id="{{ $org->id }}">
                        <td>{{ $org->diskripsi }}</td>
                        <td>
                        <button  title="Hapus" type="button" class="btn btn-icon btn-outline-danger mr-1 mb-1 waves-effect waves-light delete-pencapaian"><i data-feather='trash-2'></i></button>
                        <button  title="Kemaskini" type="button" class="btn btn-icon btn-outline-warning mr-1 mb-1 waves-effect waves-light update-pencapaian"  data-toggle="modal" data-target="#modal-pencapaian"><i data-feather='check-square'></i></button></td>
                    </tr>
                @endforeach
                @if($lampiranpencapaian->count() == 0)
                <tr data-pencapaian-id="" class="pencapaian-no-data">
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
