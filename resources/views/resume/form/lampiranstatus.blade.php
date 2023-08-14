<div id="status-vertical" class="content">
    <div class="content-header">
        <h5 class="mb-0">Status Resume</h5>
    </div>
    <div class="row">
        
        <div class="table-responsive col-md-12">
            <table>
                <tr><thead colspan= 2> <b>Status Lampiran </b></thead>
                </tr>
                <tr>
                    <td>Lampiran Kursus</td>
                     @if($lampirankursus->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                 <tr>
                    <td>Lampiran Beban Kerja</td>
                     @if($lampiranbeban->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                <tr>
                    <td>Lampiran Projek</td>
                     @if($lampiranprojek->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                
                <tr>
                    <td>Lampiran Kepakaran</td>
                     @if($lampiranpendedahan->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>
                <tr>
                    <td>Lampiran Pencapaian Tertinggi</td>
                     @if($lampiranpencapaian->count() == 0)
                     <td><div class="badge badge-danger">Tidak Lengkap</div></td>
                     @else
                     <td><div class="badge badge-success">Lengkap</div></td>
                     @endif
                </tr>

            </table>
        </div>
        <div class="form-group col-md-12">
            <br/>
            <button onclick="location.href='{{ url('/user/resume/download') }}'" type="button" class="btn btn-info tambah-pendedahan"><i data-feather='plus'></i>Muat Turun</button>
        </div>
    </div>
    <br/>
    <br/>

</div>
