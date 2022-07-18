@extends('layouts.main')

@section('customCss')

@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pemohon</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">Admin
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Perakuan Pegawai</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header basic-select2">
                                    <h4 class="card-title">IV. Perakuan Pegawai</h4>
                </div>  
                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jantina">Saya dengan ini mengesahkan bahawa saya;</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Sila Pilih</option>
                                                        <option value="tidak ambil pinjaman pendidikan">Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana institusi/ tabung pendidikan</option>
                                                        <option value="ambil pinjaman pendidikan & belum bayar">Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran</option>
                                                        <option value="ambil pinjaman pendidikan & sedang bayar tunai atau gaji">Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai/ potongan gaji</option>
                                                        <option value="ambil pinjaman pendidikan & sedang bayar tunai atau gaji">Saya ada mengambil pinjaman pendidikan dan saya telah pun menyelesaikan sepenuhnya pinjaman</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tabung_pendidikan">Nama Institusi/ Tabung Pendidikan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="tabung_pendidikan" class="form-control" name="tabung_pendidikan" placeholder="Nama Institusi/ Tabung Pendidikan" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tahun_pinjaman">Tahun Pinjaman</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="date" id="tahun_pinjaman" name="tahun_pinjaman"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">RM</span>
                                                    <input type="text" class="form-control" id="basic-url3" aria-describedby="basic-addon3" name="jumlah_pinjaman"/>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="bayaran_mulai">Bayaran Mulai (Tahun)</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="date" id="bayaran_mulai" name="bayaran_mulai"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="selesai_bayar">Selesai Pembayaran (Tahun)</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="date" id="selesai_bayar" name="selesai_bayar"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="mb-1 row">
                                                <div class="col-sm-3">    
                                                    <label class="col-form-label" for="formFileMultiple">MUATNAIK PENYATA BAYARAN PINJAMAN TERKINI /  SURAT PENGESAHAN</label>
                                                </div>
                                                <div class="col-sm-9">
                                                <input class="form-control" type="file" id="formFileMultiple" multiple name="penyata_bayaran"/>              
                                                </div>
                                            </div>    
                                        </div>              
                                    </form>
            </div>    
        </div>
    </div>
    </section>
    <div class="col-sm-12">
     
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
    <button type="#" class="btn btn-success me-1">Seterusnya</button>
    </div>
    
    </div>
</div>
@endsection

@section('customJs')

@endsection
