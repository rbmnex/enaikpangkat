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
                        <li class="breadcrumb-item active"><a href="#">Borang UKP 12</a>
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
                                    <h4 class="card-title">III. Butir-Butir Calon Untuk Tapisan Keutuhan</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="gelaran">Gelaran</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="gelaran" class="form-control" name="gelaran" placeholder="Gelaran" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="email-id">Nama</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="nama" id="nama" class="form-control" name="nama" placeholder="Nama" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="contact-info">No Kad Pengenalan</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="nokp" class="form-control" name="nokp" placeholder="No Kad Pengenalan" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jantina">Jantina</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="lelaki">Lelaki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="agama">Agama</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="islam">Islam</option>
                                                        <option value="kristian">Kristian</option>
                                                        <option value="buddha">Buddha</option>
                                                        <option value="hindu">Hindu</option>
                                                        <option value="sikh">Sikh</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="TarikhLahir">Tarikh Lahir</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                    <input type="date" id="DOB" name="DOB"
                                                        value="2022-00-00" min="2022-01-01" max="2090-12-31">
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
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
                                                        <label class="col-form-label" for="TempatLahir">Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="jawatan">Jawatan Pekerjaan (Contoh: Jurutera Awam J52)</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="jawatan" class="form-control" name="jawatan" placeholder="Jawatan Pekerjaan"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="gaji">Gaji Hakiki</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="gaji" class="form-control" name="gaji" placeholder="Gaji Hakiki"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="alamat_pejabat">Alamat Pejabat</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="alamat_pejabat" class="form-control" name="alamat_pejabat" placeholder="Alamat Pejabat"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for=alamat_rumah">Alamat Rumah</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="alamat_rumah" class="form-control" name="alamat_rumah" placeholder="Alamat Rumah"/>
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
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="nama_suami_isteri">Nama Suami/Isteri</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="nama_suami_isteri" class="form-control" name="nama_suami_isteri" placeholder="Nama Suami/Isteri"/>
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="jawatan_suami_isteri">Jawatan/Pekerjaan Suami/Isteri</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="jawatan_suami_isteri" class="form-control" name="jawatan_suami_isteri" placeholder="Jawatan/Pekerjaan Suami/Isteri"/>
                                </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="add_pejabat_suami_isteri">Alamat Pejabat Suami/Isteri</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="add_pejabat_suami_isteri" class="form-control" name="add_pejabat_suami_isteri" placeholder="Alamat Pejabat Suami/Isteri"/>
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
                    <h4 class="card-title">JAWATAN/PENEMPATAN SEPANJANG PERKHIDMATAN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="nama_suami_isteri">Gelaran Jawatan</label>
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
                                    <label class="col-form-label" for="jawatan_suami_isteri">Penempatan</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">Option 1</option>
                                                        <option value="#">Option 2</option>
                                                        <option value="#">Option 3</option>
                                                    </select>
                                                    </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="add_pejabat_suami_isteri">Tahun Berkhidmat</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">1</option>
                                                        <option value="#">2</option>
                                                        <option value="#">3</option>
                                                    </select>
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
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">Gelaran Jawatan</th>
                                            <th scope="col" class="text-nowrap">Penempatan</th>
                                            <th scope="col" class="text-nowrap">tahun Berkhidmat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Jurutera Perisian</td>
                                            <td class="text-nowrap">JKR Kedah</td>
                                            <td class="text-nowrap">2021</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jurutera Awam</td>
                                            <td>JKR Johor Bahru</td>
                                            <td>2020</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    <h4 class="card-title">JAWATAN YANG DIPEGANG DALAM PERTUBUHAN/LAIN-LAIN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="jawatan_pertubuhan">Jawatan</label>
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
                                    <label class="col-form-label" for="nama_pertubuhan">Nama Pertubuhan</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">Option 1</option>
                                                        <option value="#">Option 2</option>
                                                        <option value="#">Option 3</option>
                                                    </select>
                                                    </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="tahun">Tahun</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">1</option>
                                                        <option value="#">2</option>
                                                        <option value="#">3</option>
                                                    </select>
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
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">Jawatan</th>
                                            <th scope="col" class="text-nowrap">Nama Pertubuhan</th>
                                            <th scope="col" class="text-nowrap">Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Ahli diplomatik</td>
                                            <td class="text-nowrap">Semerah Padi</td>
                                            <td class="text-nowrap">2021</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Ahli diplomatik</td>
                                            <td>PAS</td>
                                            <td>2020</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    <h4 class="card-title">Rekod Akademik</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="kelulusan">KELULUSAN (cth: B.Eng(Hons) Civil Eng.)</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="kelulusan" class="form-control" name="kelulusan" placeholder="Kelulusan"/>               
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="pusat_pengajian_tinggi">INSTITUT PUSAT PENGAJIAN TINGGI</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="pusat_pengajian_tinggi" class="form-control" name="pusat_pengajian_tinggi" placeholder="Institut Pusat Pengajian Tinggi"/>               
                                </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="tahun">Tahun</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">1</option>
                                                        <option value="#">2</option>
                                                        <option value="#">3</option>
                                                    </select>
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
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">KELULUSAN (cth: B.Eng(Hons) Civil Eng.)</th>
                                            <th scope="col" class="text-nowrap">INSTITUT PUSAT PENGAJIAN TINGGI</th>
                                            <th scope="col" class="text-nowrap">Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Bachelor in Agriculture science (HONs)</td>
                                            <td class="text-nowrap">UITM Lendu</td>
                                            <td class="text-nowrap">2018</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Bachelor in Computer Science (HONs)</td>
                                            <td>Stamford College</td>
                                            <td>2023</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    <h4 class="card-title">REKOD KELAYAKAN PROFESIONAL DAN PENDAFTARAN DENGAN BADAN PROFESIONAL</h4>
                    <h4 class="card-title">*Salinan Sijil Pendaftaran/Perakuan Pendaftaran dengan Badan Profesional yang disahkan perlu disertakan bersama</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="kelayakan">KELAYAKAN PROFESIONAL</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="kelayakan" class="form-control" name="kelayakan" placeholder="Kelayakan Profesional"/>               
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="badan_profesional">BADAN PROFESIONAL</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="badan_profesional" class="form-control" name="badan_profesional" placeholder="Badan Profesional"/>               
                                </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="no_daftar">No Pendaftaran</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="no_daftar" class="form-control" name="no_daftar" placeholder="No Pendaftaran"/>               
                                </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="tahun">Tahun</label>
                                </div>
                                <div class="col-sm-9">
                                                    <select class="select2 form-control form-control-lg">
                                                        <option value="" selected>Please select one</option>
                                                        <option value="#">1</option>
                                                        <option value="#">2</option>
                                                        <option value="#">3</option>
                                                    </select>
                                                    </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="formFileMultiple">Muat Naik Sijil</label>
                                </div>
                                <div class="col-sm-9">
                                <input class="form-control" type="file" id="formFileMultiple" multiple />              
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-9 offset-sm-3">
                        <button type="#" class="btn btn-info me-1">Tambah Kelayakan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>  
        <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">KELAYAKAN</th>
                                            <th scope="col" class="text-nowrap">BADAN PROFESIONAL YANG DIIKTIRAF</th>
                                            <th scope="col" class="text-nowrap">NO PENDAFTARAN</th>
                                            <th scope="col" class="text-nowrap">Tahun</th>
                                            <th scope="col" class="text-nowrap">Sijil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Bachelor in Agriculture science (HONs)</td>
                                            <td class="text-nowrap">Jakim</td>
                                            <td class="text-nowrap">PS12545</td>
                                            <td class="text-nowrap">4</td>
                                            <td class="text-nowrap"><img src="https://media.istockphoto.com/vectors/certificate-concept-geometric-shapes-and-gray-background-vector-id1319497163" alt="" height=100 width=100 /></td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    <h4 class="card-title">REKOD PENSIJILAN KEKOMPETENAN</h4>
                    <h4 class="card-title"><strong>*Salinan Sijil Perakuan PE dimuatnaik oleh calon</strong></h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="pensijilan_kompeten">PENSIJILAN KEKOMPETENAN ( Cth: Kejuruteraan Struktur Bangunan, Kerja Sivil, Senibina Lestari dll.)</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="pensijilan_kompeten" class="form-control" name="pensijilan_kompeten" placeholder="PENSIJILAN KEKOMPETENAN"/>               
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="tahap">Tahap</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="tahap" class="form-control" name="tahap" placeholder="Tahap"/>               
                                </div>
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="formFileMultiple">Muat Naik Sijil</label>
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
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">Pensijilan Kekompetenan</th>
                                            <th scope="col" class="text-nowrap">Tahap</th>
                                            <th scope="col" class="text-nowrap">Sijil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Nusajaya.edu Sdn Bhd</td>
                                            <td class="text-nowrap">4</td>
                                            <td class="text-nowrap"><img src="https://media.istockphoto.com/vectors/certificate-concept-geometric-shapes-and-gray-background-vector-id1319497163" alt="" height=100 width=100 /></td>
                                        </tr>
                                    </tbody>
                                </table>
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
                    <h4 class="card-title">PENGIKTIRAFAN</h4>
                </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="pengiktirafan">PENGIKTIRAFAN ( Cth: APC/PPC/Pingat atau Anugerah Umum)</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="pengiktirafan" class="form-control" name="pengiktirafan" placeholder="Pengiktirafan"/>               
                                </div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="mb-1 row">
                                <div class="col-sm-3">    
                                    <label class="col-form-label" for="tahun">Tahun</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="tahun" class="form-control" name="tahun" placeholder="Tahun"/>               
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
                            <div class="card-body">
                            <form class="form form-horizontal">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">Bil</th>
                                            <th scope="col" class="text-nowrap">Pengiktirafan</th>
                                            <th scope="col" class="text-nowrap">Tahun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Nusajaya.edu Sdn Bhd</td>
                                            <td class="text-nowrap">4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                            </div>                          
                        </div>
                    </div>
        </div>  
        <div>
            <center>
            <button type="#" class="btn btn-primary me-1">KemasKini</button>
            <button type="#" class="btn btn-primary me-1">Delete</button>
            </center>
        </div>   
    </div>    
    </div class="col-sm-12">
    <a href="/admin/pengguna/mockup1">
    <button type="#" class="btn btn-success me-1">Seterusnya</button>
    </a>
    </section>
</div>
@endsection

@section('customJs')

@endsection
