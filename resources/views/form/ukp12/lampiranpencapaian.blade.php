<div id="pencapaian-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Senarai Pencapaian Tertinggi(Sekurang-kurangnya 1 item, dan perlu dalam bentuk ayat penuh) </h5>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <br/>
            <button type="button" class="btn btn-success tambah-pencapaian" data-toggle="modal" data-target="#modal-pencapaian"><i data-feather='plus'></i>Tambah</button>
        </div>
        <div class="table-responsive col-md-12">
            <table class="datatables table -table">
                <thead>
                    <th>Senarai Kepakaran</th>
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
        <div class="form-group col-md-12"> 
           
        </div>
        <div class="form-group col-md-12">      <button type="button" class="btn btn-info selesai-calon" data-toggle="modal" data-target="#modal-selesai"><i data-feather='send'></i>Hantar</button>
            <br/>
             <!-- @if($lampirankursus->count() != 0 && $lampiranbeban->count() != 0 && $lampiranprojek->count() != 0 && $lampiranpendedahan->count() != 0 && $lampiranpencapaian->count() != 0) -->
      
           <!--  @else
             <button type="button" disabled class="btn btn-info selesai-lampiran" data-toggle="modal" data-target="#modal-selesai"><i data-feather='send'></i>Hantar</button><br>
             @endif
              @if ($lampirankursus->count() == 0)
            <span style="color:red; font-size:10px"> * lengkapkan lampiran kursus</span><br>@endif
            @if ($lampiranbeban->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran beban</span><br>@endif
             @if ($lampiranprojek->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran projek</span><br>@endif
             @if ($lampiranpendedahan->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran pendedahan</span><br>@endif
             @if ($lampiranpencapaian->count() == 0)
             <span style="color:red; font-size:10px"> * lengkapkan lampiran pencapaian</span>
             @endif -->
        </div>

    </div>
    <br/>
    <br/>

</div>
