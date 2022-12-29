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
                        <li class="breadcrumb-item"><a href="/dashboard">Laman Utama</a>
                        </li>
                        <li class="breadcrumb-item">Admin
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Borang JKR/UKP/12</a>
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
                                    <h4 class="card-title">I. Butir-Butir Peribadi</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nokp_lama">No KP Lama</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nokp_lama" class="form-control" name="nokp_lama" placeholder="No KP Lama" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jawatan">Jawatan & Gred Sekarang</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="jawatan" class="form-control" name="jawatan" placeholder="Jawatan & Gred Sekarang" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tarih_lantikan">Tarikh lantikan perkhidmatan (semasa J41</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="date" id="tarih_lantikan" name="tarih_lantikan"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="umur">Umur Persaraan Wajib </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="number" id="umur" class="form-control" name="umur" placeholder="Umur Persaraan Wajib" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="TarikhLahir">Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Sepanjang Perkhidmatan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="ada">Ada</option>
                                                        <option value="tiada">Tiada</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                </div>
             </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="maklumat_cuti">Maklumat Cuti</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">Cuti tanpa gaji</option>
                                                        <option value="#">Cuti separuh gaji</option>
                                                        <option value="#">Cuti belajar bergaji penuh/Cuti belajar separuh gaji</option>
                                                    </select>
                                                    </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="tarih_mula">Tarikh Mula</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="date" id="tarih_lantikan" name="tarih_mula"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="tarikh_tamat">Tarikh Tamat</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="date" id="tarikh_tamat" name="tarikh_tamat"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="formFileMultiple">Muat Naik Surat Kelulusan Cuti</label>
                                </div>
                                <div class="col-sm-9">
                                <input class="form-control" type="file" id="formFileMultiple" multiple />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                        <button type="#" class="btn btn-info me-1">Tambah</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Senarai Cuti</h4>
                        </div>
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Cuti</th>
                                            <th scope="col" class="text-nowrap">Tarikh Mula</th>
                                            <th scope="col" class="text-nowrap">tarikh Tamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">Selasa</td>
                                            <td class="text-nowrap">29/2/2022</td>
                                            <td class="text-nowrap">2/3/2022</td>
                                        </tr>
                                        <tr>
                                            <td>Rabu</td>
                                            <td>5/5/2022</td>
                                            <td>7/5/2022</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="col-4">
                            <center>
                            <button type="#" class="btn btn-primary me-1">KemasKini</button>
                            <button type="#" class="btn btn-primary me-1">Delete</button>
                            </center>
                            </div>
                            </form>
                            </div>
                        </div>

                    </div>

        </div>
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">Pengesahan Butir-butir perkhidmatan</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="alamat_bertugas">Alamat Tempat Bertugas</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="alamat_bertugas" class="form-control" name="alamat_bertugas" placeholder="Alamat tempat bertugas"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="no_tel_pejabat">No Telefon Pejabat</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="no_tel_pejabat" class="form-control" name="no_tel_pejabat" placeholder="No Telefon Pejabat"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="no_faksimili">No Faksimili</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="no_faksimili" class="form-control" name="no_faksimili" placeholder="No Faksimili"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="no_telefon">No Telefon Bimbit</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="no_telefon" class="form-control" name="no_telefon" placeholder="No Telefon Bimbit"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="emel">Emel</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="emel" class="form-control" name="emel" placeholder="Emel"/>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="basic-select2">
                <div class="card-header">
                    <h4 class="card-title">Pengisytiharan harta</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="tarikhAkhir_harta">Tarikh Akhir Pengisytiharan Harta Terkini:</label>
                                </div>
                                <div class="col-sm-9">
                                <input type="date" id="tarikhAkhir_harta" name="tarikhAkhir_harta"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="lampiran_E">Muat Naik Lampiran E</label>
                                </div>
                                <div class="col-sm-9">
                                <input class="form-control" type="file" id="lampiran_E" multiple />
                            </div>
                        </div>
                        </div>
                        <div class="card-header">
                        <h4 class="card-title"><strong>*Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama</strong></h4>
                        <h4 class="card-title">*Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</h4>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div class="col-sm-12">
        <div class="col-sm-4">

        </div>

        <div class="col-sm-4">

        <div>

        <div class="col-sm-4">
         <a href="/admin/pengguna/mockup2">
        <button type="#" class="btn btn-success me-1">Seterusnya</button>
        </a>
        </div>
    </div>
    </section>
</div>
@endsection

@section('customJs')

@endsection
