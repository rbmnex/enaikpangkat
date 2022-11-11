@extends('layouts.main')

@section('customCss')
@include('web.sweet-alert-css')
<link rel="stylesheet" type="text/css" href="{{asset('asset//vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<style>
    input.larger {
      width: 50px;
      height: 50px;
    }
    input.medium {
      width: 25px;
      height: 25px;
    }
    input.small {
      width: 10px;
      height: 10px;
    }
    .head-cell {
        vertical-align: top;
        text-transform: uppercase;
        font-size: 0.857rem;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #ebe9f1;
        padding: 0.72rem 2rem;
        background-color: #f3f2f7;
    }

    .cell {
        border-top: 1px solid #ebe9f1;
    }
  </style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            {{-- <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Pengurusan Pengguna</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Rumah</a>
                        </li>
                        <li class="breadcrumb-item">Admin
                        </li>
                        <li class="breadcrumb-item active"><a href="#">Pengurusan Pengguna</a>
                        </li>
                    </ol>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
        <h4 class=""><span style="font-weight: bold;">Borang Pemangkuan JKR UKP 12</span></h4>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title pull-left">BUTIR-BUTIR PERIBADI</h4>
                    @role(['superadmin','secretariat'])
                    <div class="text-right">
                                            <button data-appl-id={{ $pemohon->id_permohonan }} class="btn btn-success btn-back">
                                                <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Kembali</span>
                                            </button>
                    </div>
                    @endrole
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- section1 --}}
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="vertical-username">Nama</label>
                            <input type="text" id="sect-1-nama" readonly name="nama" class="form-control"  value="{{ $peribadi->nama }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">No Kad Pengenalan (Lama)</label>
                            <input type="text" id="vertical-email" readonly name="nokp_lama" class="form-control"
                            value="{{ $peribadi->nokp_lama}}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">No Kad Pengenalan (Baru)</label>
                            <input type="number" id="sect-1-nokp" readonly nama="nokp" class="form-control"
                            value="{{ $peribadi->nokp }}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Jawatan</label>
                            <input type="text" id="sect-1-jawatan" readonly name="jawatan" class="form-control" value="{{ $pemohon->jawatan }}"
                            placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Gred</label>
                            <input type="text" id="sect-1-gred" readonly name="gred" class="form-control" value="{{ $pemohon->gred }}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Tarikh Lantikan Perkhidmatan</label>
                            <input type="text" id="sect-1-tkh_lantik" readonly name="tkh_lantikan" class="form-control" value="{{ \Carbon\Carbon::parse($pemohon->tkh_lantikan)->format('d-m-Y')  }}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Tarikh Disahkan Jawatan</label>
                            <input type="text" id="sect-1-tkh_sah" readonly name="tkh_sah" class="form-control" value="{{ \Carbon\Carbon::parse($pemohon->tkh_sah_perkhidmatan)->format('d-m-Y') }}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Umur Persaraan Wajib</label>
                            <input type="number" id="sect-1-bersara" readonly nama="pilihan_bersara_wajib" value="{{ $peribadi->pilihan_bersara_wajib }}" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <input type="hidden" id="id_pemohon" class="hidden_id" value="{{ $pemohon->id }}"/>
                        {{-- end section1 --}}
                        {{-- section 2 --}}

                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="country">Pengesahan Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Bergaji Penuh / Cuti Belajar Separuh Gaji</label>
                            {{-- <select class="select2 form-control" name="cuti_status" id="status_cuti">
                                <option>-- Sila Pilih --</option>
                                <option value="ada" @if($profile['cuti']->count() > 0){{ 'selected' }} @endif>ADA</option>
                                <option value="tiada" @if($profile['cuti']->count() == 0){{ 'selected' }} @endif>TIADA</option>
                            </select> --}}
                            <input type="text" class="form-control" readonly value="@if($cutis->count() > 0) {{ 'ADA' }} @else {{ 'TIADA' }} @endif"/>
                        </div>
                        <span style="font-style: italic;">* Surat Kelulusan Cuti yang disahkan perlu disertakan bersama.</span>
                        <br/>
                        <div class="table-responsive col-md-12">
                            <table class="datatables table cuti-table">
                                <thead>
                                    <th>Jenis Cuti</th>
                                    <th>Tarikh Mula</th>
                                    <th>Tarikh Akhir</th>
                                    {{-- <th>Dokumen</th> --}}
                                    {{-- <th>Ti</th> --}}
                                </thead>
                                <tbody id="tbody-cuti">
                                    @foreach ($cutis as $cuti)
                                    <tr data-cuti-id="{{ $cuti->id_cuti }}">
                                        <td>{{ $cuti->jenis }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cuti->tkh_mula)->format('d-m-Y')  }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cuti->tkh_akhir)->format('d-m-Y')  }}</td>
                                        {{-- <td><input class="form-control cuti-upload" type="file" id="cuti_{{ $cuti->id_cuti }}" name="cuti_{{ $cuti->id_cuti }}" /></td> --}}
                                    </tr>
                                    @endforeach
                                    @if($cutis->count() == 0)
                                    <tr data-cuti-id="">
                                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-form-group col-md-12">
                            <label class="col-form-label" for="alamat_bertugas">Alamat Tempat Bertugas</label>
                            <textarea row=6 readonly id="sect-2-alamat_pej" class="form-control" name="alamat_bertugas" value="" placeholder="">{{ $pemohon->alamat_pejabat }}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-form-group col-md-6">
                            <label class="col-form-label" for="no_tel_pejabat">No Telefon Pejabat</label>
                            <input type="text" readonly id="sect-2-tel_pejabat" class="form-control" name="no_tel_pejabat" value="{{ $peribadi->tel_pejabat }}" placeholder=""/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="no_faksimili">No Faksimili</label>
                            <input type="text" readonly id="sect-2-no_faksimili" class="form-control" name="no_faksimili" value="{{ $peribadi->fax_pejabat }}" placeholder="No Faksimili"/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="no_telefon">No Telefon Bimbit</label>
                            <input type="text" readonly id="sect-2-no_tel" class="form-control" name="no_telefon" value="{{ $peribadi->tel_bimbit }}" placeholder="No Telefon Bimbit"/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="emel">Emel</label>
                            <input type="text" readonly id="sect-2-emel" class="form-control" name="emel" value="{{ $peribadi->email }}" placeholder="Emel"/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <span class="col-form-label cuti-file">{{ $pemohon->file->filename }}</span>
                            <button class="btn btn-warning btn-download" data-file-id="{{ $pemohon->pengesahan_cuti }}">
                                <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                                <i data-feather="download" class="align-middle ml-sm-25 ml-0"></i>
                            </button>
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label class="col-form-label" for="email-id">Muat Naik Borang Pengesahan (Disahkan oleh Kerani Perkhidmatan)</label>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group d-flex justify-content-between col-md-12">
                            <div class="file btn btn-primary">
                                <i data-feather='upload'></i>  Muat Naik
                                <input class="form-control file-input cuti-upload" type="file" id="cuti_sah" name="cuti_sah"/>
                            </div>
                            <span class="col-form-label cuti-file">{{ $profile['file_cuti'] }}</span>
                            <div class="invalid-feedback"></div>
                            <button class="btn btn-warning btn-download">
                                <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                                <i data-feather="download" class="align-middle ml-sm-25 ml-0"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="invalid-feedback cuti-error"></div>
                        </div> --}}
                    </div>
                    {{-- end section 2 --}}
                    {{-- section 3 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="tarikhAkhir_harta">Tarikh Akhir Pengisytiharan Harta Terkini:</label>
                            <input type="text" readonly class="form-control" value="{{ \Carbon\Carbon::parse($harta->tkh_akhir_pengisytiharan)->format('d-m-Y') }}" id="tarikhAkhir_harta" name="harta_tkh_akhir_pengisytiharan">
                            <div class="invalid-feedback"></div>
                        </div>
                        {{-- <div class="form-group col-md-12">

                            <label class="col-form-label" for="lampiran_E">Muat Naik Lampiran E</label>


                        </div> --}}
                        <div class="form-group col-md-12">
                            {{-- <div class="file btn btn-primary">
                                <i data-feather='upload'></i> Muat Naik
                                <input class="file-input upload-harta" type="file" id="lampiran_E" name="harta_surat_kelulusan" />
                            </div> --}}
                            <span class="col-form-label harta-file">{{ $harta->file->filename }}</span>
                            <button class="btn btn-warning btn-download" data-file-id="{{ $harta->surat_kelulusan_id }}">
                                <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                                <i data-feather="download" class="align-middle ml-sm-25 ml-0"></i>
                            </button>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" style="font-style: italic" for=""><b>* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama</b></label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" style="font-style: italic" for=""><b>* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</b></label>
                        </div>
                    </div>
                    {{-- end section 3 --}}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">BUTIR-BUTIR CALON UNTUK TAPISAN KEUTUHAN</h4>
                </div>
                <div class="card-body">
                    {{-- section 4 --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="gelaran">Gelaran</label>
                            <input type="text" readonly id="sect-4-gelaran" class="form-control" name="gelaran" value="{{ $peribadi->gelaran }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="email-id">Nama</label>
                            <input type="nama" id="sect-4-nama" readonly class="form-control" name="nama" value="{{ $peribadi->nama }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="contact-info">No Kad Pengenalan (Baru)</label>
                            <input type="text" id="sect-4-nokp" readonly class="form-control" name="nokp_utuh" value="{{ $peribadi->nokp }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="contact-info">No Kad Pengenalan (Lama)</label>
                            <input type="text" id="sect-4-nokp_lama" readonly class="form-control" name="nokp_lama" value="{{ $peribadi->nokp_lama }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label" for="jantina">Jantina</label>
                            {{-- <select class="select2 form-control" id="gender_select" nama="jantina" value="">
                                <option value="" selected>-- Sila Pilih --</option>
                                <option value="L">Lelaki</option>
                                <option value="P">Perempuan</option>
                            </select> --}}
                            <input type="text" id="sect-4-jantina" readonly class="form-control" name="jantina" value="@if(strtoupper($peribadi->jantina) == 'L'){{ 'Lelaki' }}@elseif (strtoupper($peribadi->jantina) == 'P'){{ 'Perempuan' }}@endif" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label" for="bangsa">Bangsa</label>
                                {{-- <select class="select2 form-control" id="race_select" name="bangsa">
                                    <option value="">-- Sila Pilih --</option>
                                    @foreach ($race as $bangsa)
                                    <option value="{{ $bangsa->kod_bangsa }}" @if($profile['bangsa'] == $bangsa->kod_bangsa)
                                        selected
                                    @endif>{{ $bangsa->bangsa }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" id="sect-4-bangsa" readonly class="form-control" name="bangsa" value="{{ $peribadi->bangsa }}" placeholder="" />
                                <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label" for="bangsa">Agama</label>
                                {{-- <select class="select2 form-control" id="religious_select" name="agama">
                                    <option value="">-- Sila Pilih --</option>
                                    @foreach ($religious as $agama)
                                    <option value="{{ $agama->kod_agama }}" @if($profile['agama'] == $agama->kod_agama)
                                        selected
                                    @endif>{{ $agama->agama }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" id="sect-4-agama" readonly class="form-control" name="bangsa" value="{{ $peribadi->agama }}" placeholder="" />
                                <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="tkh_lahir">Tarikh Lahir</label>
                            <input type="text" readonly class="form-control" id="sect-4-tkh_lahir" name="tkh_lahir"
                            value="{{ \Carbon\Carbon::parse($peribadi->tkh_lahir)->format('d-m-Y') }}" >
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="email-id">Tempat Lahir</label>
                            <input type="nama" id="sect-4-tmpt_lahir" readonly class="form-control" name="tmpt_lahir" value="{{ $peribadi->negeri_lahir }}" placeholder="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Jawatan</label>
                            <input type="text" id="sect-4-jawatan" readonly name="jawatan" value="{{ $pemohon->jawatan }}" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Gred</label>
                            <input type="text" id="sect-4-gred" readonly name="gred" class="form-control" value="{{ $pemohon->gred }}" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-form-group col-md-6">
                            <label class="col-form-label" for="vertical-email">Gaji Hakiki</label>
                            <input type="number" id="sect-4-gaji" readonly name="gaji_hakiki" value="{{ $pemohon->gaji_hakiki }}" class="form-control" placeholder=""  />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" id="sect-4-taraf" value="{{ $peribadi->taraf_perkahwinan }}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="alamat_bertugas">Alamat Pejabat</label>
                            <textarea row=3 type="text" id="sect-4-alamat_bertugas" readonly class="form-control" name="alamat_pejabat"  placeholder="">{{ $peribadi->alamat_pejabat }}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="alamat_bertugas">Alamat Rumah</label>
                            <textarea row=3 type="text" id="sect-4-alamat_rumah" readonly class="form-control" name="alamat_rumah" placeholder="">{{  $peribadi->alamat  }}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="col-form-label" for="email-id">Nama Pasangan</label>
                            <input type="nama" id="sect-4-nama_pasangan" value="{{ $pasangan ? $pasangan->nama : '' }}" readonly class="form-control" name="nama_pasangan" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="email-id">Jawatan/Pekerjaan Pasangan</label>
                             <input type="nama" value="{{ $pasangan ? $pasangan->pekerjaan : '' }}" id="jawatan_pasangan" readonly class="form-control" name="sect-4-jawatan_pasangan" placeholder="" />
                             <div class="invalid-feedback"></div>
                         </div>
                         <div class="form-group col-md-12">
                            <label class="col-form-label" for="alamat_bertugas">Alamat Pejabat Pasangan</label>
                            <textarea row=6 readonly id="sect-4-alamat_pejabat_pasangan" class="form-control" name="alamat_pejabat_pasangan" placeholder=""/>{{ $pasangan ? $pasangan->alamat_pejabat : ''}}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    {{-- end section 4 --}}
                    {{-- section 5 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                        <h5 class="mb-0">JAWATAN/PENEMPATAN SEPANJANG PERKHIDMATAN </h5>
                        </div>
                        <div class="form-group col-md-12">
                        <div class="table-responsive">
                            <table class="datatables table -table">
                                <thead>
                                    <th>Bil.</th>
                                    <th>Gelaran Jawatan</th>
                                    <th>Penempatan</th>
                                    <th>Tahun Berkhidmat</th>
                                </thead>
                                <tbody id="tbody-khidmat">
                                    @foreach ($perkhidmatans as $pengalaman)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengalaman->jawatan ?? '' }}</td>
                                        <td>{{ $pengalaman->penempatan }}</td>
                                        <td>{{  \Carbon\Carbon::parse($pengalaman->tkh_mula_berkhidmat)->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                    @if($perkhidmatans->count() == 0)
                                    <tr data-pengalaman-id="">
                                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>


                                    @endif
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    {{-- end section 5 --}}
                    {{-- section 6 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                        <h5 class="mb-0">JAWATAN YANG DIPEGANG DALAM PERTUBUHAN/LAIN-LAIN</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="table-responsive">
                                <table class="datatables table -table">
                                    {{-- <thead>
                                        <th>Jawatan</th>
                                        <th>Nama Pertubuhan</th>
                                        <th>Tahun</th>

                                    </thead>
                                    <tbody id="tbody-badan">
                                    @foreach ($pertubuhans as $org)
                                        <tr data-pertubuhan-id="{{ $org->id }}">
                                            <td>{{ $org->jawatan }}</td>
                                            <td>{{ $org->nama }}</td>
                                            <td>{{ $org->tahun }}</td>
                                        </tr>
                                    @endforeach
                                    @if($pertubuhans->count() == 0)
                                    <tr data-pertubuhan-id="">
                                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>


                                    @endif
                                    </tbody> --}}
                                    <thead>
                                        <th>Bil.</th>
                                        <th>Sumbangan/Jawatankuasa Teknikal</th>
                                        <th>Tempat</th>
                                        <th>Tahun</th>
                                        {{-- <th>Tindakan</th> --}}
                                    </thead>
                                    <tbody id="tbody-badan">
                                    @foreach ($sumbangan as $org)
                                        <tr data-pertubuhan-id="{{ $org->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $org->sumbangan }}</td>
                                            <td>{{ $org->tempat }}</td>
                                            <td>{{ $org->tkh_peristiwa ? \Carbon\Carbon::parse($org->tkh_peristiwa)->format('Y') : ''  }}</td>
                                        </tr>
                                    @endforeach
                                    @if($sumbangan->count() == 0)
                                    <tr data-pertubuhan-id="">
                                        <td colspan="4" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end section 6 --}}
                    {{-- section 7 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <h5 class="mb-0">REKOD AKADEMIK</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="table-responsive">
                                <table class="datatables table -table">
                                    <thead>
                                        <th>Bil.</th>
                                        <th>Kelulusan</th>
                                        <th>Institut Pusat Pengajian Tinggi</th>
                                        <th>Tahun</th>
                                    </thead>
                                    <tbody id="tbody-universiti">
                                    @foreach ($akademiks as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->nama_sijil }}</td>
                                            <td>{{ $a->nama_insititusi }}</td>
                                            <td>{{ empty($a->tkh_kelulusan) ? '' : \Carbon\Carbon::parse($a->tkh_kelulusan)->format('Y') }}</td>
                                        </tr>
                                    @endforeach
                                    @if($akademiks->count() == 0)
                                    <tr data-akademik-id="">
                                        <td colspan="4" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>


                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end section 7 --}}
                    {{-- section 8 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <h5 class="mb-0">REKOD KELAYAKAN PROFESSIONAL DAN PENDAFTARAN DENGAN BADAN PROFESIONAL</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="table-responsive">
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
                                    @foreach ($profesionals as $pro)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pro->nama_sijil }}</td>
                                            <td>{{ $pro->badan_professional }}</td>
                                            <td>{{ $pro->no_pendaftaran }}</td>
                                            <td>{{ empty($pro->tkh_kelulusan) ? '' : \Carbon\Carbon::parse($pro->tkh_kelulusan)->format('Y') }}</td>
                                        </tr>
                                    @endforeach
                                    @if($profesionals->count() == 0)
                                    <tr data-profesional-id="">
                                        <td colspan="5" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>


                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end section 8 --}}
                    {{-- section 9 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <h5 class="mb-0">REKOD PENSIJILAN KEKOMPETENAN</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="table-responsive col-md-12">
                                <table class="datatables table komp-table">
                                    <thead>
                                        <th>Bil.</th>
                                        <th>Pensijilan Kekompetenan</th>
                                        <th>Tahap</th>
                                    </thead>
                                    <tbody id="tbody-kompeten">
                                    @foreach ($kompetenans as $k)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama_sijil }}</td>
                                    <td>{{ $k->tahap }}</td>
                                    @endforeach
                                    @if($kompetenans->count() == 0)
                                    <tr data-kompeten-id="">
                                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>


                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end section 9 --}}
                    {{-- section 10 --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <h5 class="mb-0">PENGIKTIRAFAN</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="table-responsive">
                                <table class="datatables table -table">
                                    <thead>
                                        <th>Bil.</th>
                                        <th>Pengiktirafan</th>
                                        <th>Tahun</th>
                                    </thead>
                                    <tbody id="tbody-iktiraf">
                                    @foreach ($pengiktirafans as $sijil)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sijil->jenis ?? '' }}</td>
                                            <td>{{ empty($sijil->tkh_mula) ? '' : \Carbon\Carbon::parse($sijil->tkh_mula)->format('Y') }}</td>
                                        </tr>
                                    @endforeach
                                    @if($pengiktirafans->count() == 0)
                                    <tr data-pengiktirafan-id="">
                                        <td colspan="3" style="text-align: center; font-style: italic;">{{ 'Tiada Data' }}</td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- end section 10 --}}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">SURAT AKUAN PINJAMAN PENDIDIKAN INSTITUSI / TABUNG PENDIDIKAN</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="jantina">Saya dengan ini mengesahkan bahawa saya:</label>
                            {{-- <select id="status_pinjam" class="select2 form-control pinjam-status" name="status_pinjam">
                                <option value="" selected>-- Sila Pilih --</option>
                                <option value="0">Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana institusi/ tabung pendidikan</option>
                                <option value="1">Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran</option>
                                <option value="2">Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai/ potongan gaji</option>
                                <option value="3">Saya ada mengambil pinjaman pendidikan dan saya telah pun menyelesaikan sepenuhnya pinjaman</option>
                            </select> --}}
                            @if($akuan_pinjaman->status == 0)
                            <input type="text" class="form-control" readonly value="Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana institusi/ tabung pendidikan"/>
                            @elseif($akuan_pinjaman->status == 1)
                            <input type="text" class="form-control" readonly value="Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran"/>
                            @elseif($akuan_pinjaman->status == 2)
                            <input type="text" class="form-control" readonly value="Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai/ potongan gaji"/>
                            @elseif($akuan_pinjaman->status == 3)
                            <input type="text" class="form-control" readonly value="Saya ada mengambil pinjaman pendidikan dan saya telah pun menyelesaikan sepenuhnya pinjaman"/>
                            @endif
                            <div class="invalid-feedback"></div>
                        </div>
                        @if($akuan_pinjaman->status > 0)
                        <div class="form-group col-md-12 div-loan-1">
                            <label class="col-form-label" for="tabung_pendidikan">Nama Institusi/ Tabung Pendidikan</label>
                            <input type="text" id="tabung_pendidikan" class="form-control nama_tabung" name="tabung_pendidikan" value="{{ $akuan_pinjaman->nama_institusi }}" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group col-md-12 div-loan-2">
                            <label class="col-form-label" for="jumlah_pinjaman">Jumlah Pinjaman</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">RM</span>
                            <input type="number" class="form-control jumlah_pinjaman" id="basic-url3" aria-describedby="basic-addon3" value="{{ $akuan_pinjaman->jumlah_pinjaman }}" name="jumlah_pinjaman"/>
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>


                        <div class="form-group col-md-12 div-loan-3">
                            <label class="col-form-label" for="bayaran_mulai">Mula Pinjaman</label>
                            <input type="text" class="form-control flatpickr-loan mula_pinjam" id="mula_pinjaman" name="mula_pinjaman"
                                value="{{ \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_pinjaman)->format('d-m-Y') }}" />
                                                                        <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-12 div-loan-4">
                            <label class="col-form-label" for="bayaran_mulai">Akhir Pinjaman</label>
                            <input type="text" class="form-control flatpickr-loan akhir_pinjam" id="akhir_pinjaman" name="akhir_pinjaman"
                                value="{{ \Carbon\Carbon::parse($akuan_pinjaman->tkh_akhir_pinjaman)->format('d-m-Y') }}" />
                                                                        <div class="invalid-feedback"></div>
                        </div>
                        @endif
                        @if($akuan_pinjaman->status == 2)
                        <div class="form-group col-md-12 div-loan-5">
                            <label class="col-form-label" for="bayaran_mulai">Bayaran Mulai</label>
                            <input type="text" class="form-control flatpickr-loan bayar_mula" id="bayaran_mulai" name="bayaran_mulai" value="{{ \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_bayaran)->format('d-m-Y') }}" />
                                                                        <div class="invalid-feedback"></div>
                        </div>
                        @endif
                        @if($akuan_pinjaman->status == 3)
                        <div class="form-group col-md-12 div-loan-6">
                            <label class="col-form-label" for="selesai_bayar">Selesai Pembayaran</label>
                            <input type="text" class="form-control flatpickr-loan selesai_bayar" id="selesai_bayar" name="selesai_bayar"
                                    value="{{ \Carbon\Carbon::parse($akuan_pinjaman->tkh_selesai_bayaran)->format('d-m-Y') }}" />
                                                                        <div class="invalid-feedback"></div>
                        </div>
                        @endif
                        @if($akuan_pinjaman->status > 0)
                        <div class="form-group col-md-12 div-loan-7">
                            <label class="col-form-label" for="formFileMultiple">PENYATA BAYARAN PINJAMAN TERKINI /  SURAT PENGESAHAN</label>
                        </div>
                        <div class="form-group col-md-12 div-loan-7">
                            {{-- <div class="file btn btn-primary">
                                <i data-feather='upload'></i> Muat Naik
                                <input class="form-control file-input penyata_bayaran" type="file" id="formFileMultiple" name="penyata_bayaran"/>
                            </div> --}}
                            <span class="col-form-label loan-file"></span>
                            <button class="btn btn-warning btn-download">
                                <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                                <i data-feather="download" class="align-middle ml-sm-25 ml-0"></i>
                            </button>
                            <div class="invalid-feedback"></div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PERAKUAN PEGAWAI</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">Saya dengan ini mengesahkan bahawa saya:</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">a) Tindakan tatatertib:</label>
                            @if($akuan_pegawai->tatatertib == 1)
                            <input type="text" class="form-control" readonly value="Pernah"/>
                            @else
                            <input type="text" class="form-control" readonly value="Tidak Pernah"/>
                            @endif
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="1" class="form-check-input tatatertib" name="tatatertib" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Pernah</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="0" class="form-check-input tatatertib" name="tatatertib" id="radio2" />
                                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" id="label-tatatertib"></label>
                            <div class="invalid-feedback"></div>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">b) Telah mengisytiharkan harta mengikut peraturan yang ditetapkan</label>
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="1" class="form-check-input" name="harta" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Pernah</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="0" class="form-check-input" name="harta" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
                            </div>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">c) Lanjutan tempoh percubaan dengan denda</label>
                            @if($akuan_pegawai->tatatertib == 1)
                            <input type="text" class="form-control" readonly value="Pernah"/>
                            @else
                            <input type="text" class="form-control" readonly value="Tidak Pernah"/>
                            @endif
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="1" class="form-check-input denda" name="denda" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Pernah</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="0" class="form-check-input denda" name="denda" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group col-md-12">
                            <label class="col-form-label" id="label-denda"></label>
                            <div class="invalid-feedback"></div>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">d) Cuti Tanpa Gaji selain Cuti Belajar Tanpa Gaji</label>
                            @if($akuan_pegawai->tatatertib == 1)
                            <input type="text" class="form-control" readonly value="Pernah"/>
                            @else
                            <input type="text" class="form-control" readonly value="Tidak Pernah"/>
                            @endif
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="1" class="form-check-input cuti_check" name="cuti_check" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Pernah</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="0" class="form-check-input cuti_check" name="cuti_check" id="radio1" />
                                <label class="col-form-label" for="tatatertib"> Tidak Pernah</label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" id="label-cuti_check"></label>
                            <div class="invalid-feedback"></div>
                        </div> --}}
                        <div class="form-group col-md-12">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" readonly onclick="return false;" class="form-check-input medium akuan_peribadi" value="1" name="akuan" id="checkbox_akuan" checked />
                                <label class="col-form-label" for="customCheck1">Saya mengaku bahawa butiran yang dinyatakan di dalam Borang JKR/UKP/12 ini adalah benar. Sekiranya tidak benar, saya boleh dikenakan tindakan tatatertib di bawah Peraturan 4 (f) dan Peraturan 4 (g), Peraturan-Peraturan Pegawai Awam ( Kelakuan dan Tatatertib ) 1993.</label>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">Nama: {{ $peribadi->nama }}</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">Jawatan: {{ $pemohon->jawatan }}</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">Alamat Pejabat: {{ $peribadi->alamat_pejabat }}</label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-form-label" for="">Tarikh: {{ \Carbon\Carbon::parse($akuan_pegawai->perakuan_tkh)->format('d-m-Y') }}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @role(['secretariat','superadmin','user'])
        <div class="col-12">
            <div class="card" style="background-color: greenyellow;">
            <div class="card-header">
                <h4 class="card-title">UNTUK TINDAKAN URUS SETIA KENAIKAN PANGKAT</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Markah LNPT TerkinI (Tiga (3) Tahun Terakhir)</label>
                    </div>
                    <div class="form-group col-md-12">
                        <table style="border-collapse: collapse; " class="table">
                            <tbody>
                                <tr>
                                    <td class="cell head-cell">Tahun</td>
                                    @foreach($lnpt as $m)
                                    <td class="cell">{{ $m->tahun }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="cell head-cell">Markah</td>
                                    @foreach($lnpt as $p)
                                    <td class="cell">
                                        <div class="form-group">
                                        <input type="number" id="markah-{{ $p->tahun }}" class="markah-lnpt form-control" data-tahun-lnpt="{{ $p->tahun }}" value="{{ $p->purata }}">
                                        <div class="invalid-feedback"></div>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" style="font-style: italic" for=""><b>* Pegawai KADER perlu memajukan salinan LNPT yang telah disahkan oleh pejabat</b></label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" style="font-style: italic" for=""><b>* Sekiranya menggunakan Laporan Nilaian Prestasi Khas (LNPK), LNPK tersebut perlu disahkan dan disertakan bersama.</b></label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Pengesahan Tindakan Tatatertib</label>
                    </div>
                    {{-- @role(['superadmin','secretariat']) --}}
                    <div class="form-group col-md-12">
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="1" class="form-check-input medium tatatertib2" {{-- @role('user')onclick="return false;"@endrole --}} @if(!empty($tatatertib)){{ $tatatertib->pengesahan_tindakan == '1' ? 'checked' : '' }}@endif name="tatatertib2" id="radio1" />
                            <label class="col-form-label" for="tatatertib"> Ada</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input type="radio" value="0" class="form-check-input medium tatatertib2" {{-- @role('user')onclick="return false;"@endrole--}} @if(!empty($tatatertib)){{ $tatatertib->pengesahan_tindakan == '0' ? 'checked' : '' }}@endif name="tatatertib2" id="radio2" />
                            <label class="col-form-label" for="tatatertib"> Tiada </label>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                     {{-- @endrole --}}
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Jenis Hukuman (Jika Ada)</label>
                        <input type="text" id="nama_hkm" class="form-control" name="nama_hkm" value="{{ empty($tatatertib) ? '' : $tatatertib->jenis_hukuman }}" placeholder="" {{-- @role('user') readonly @endrole --}}/>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-form-label" for="">Tarikh Hukuman</label>
                        <input type="text" class="form-control flatpickr-hkm tkh_hukuman" id="selesai_bayar" name="selesai_bayar" value="@if(!empty($tatatertib)){{ empty($tatatertib->tkh_hukuman) ? '' : \Carbon\Carbon::parse($tatatertib->tkh_hukuman)->format('d-m-Y') }} @endif"/>
                    </div>
                    @role(['secretariat','superadmin'])
                    <div class="col-md-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-primary btn-prev btn-bpsm">
                            <i data-feather='send' class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Hantar</span>
                        </button>
                    </div>
                    @endrole
                </div>
            </div>
            </div>
        </div>
        @endrole
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PENGESAHAN KETUA BAHAGIAN PERKHIDMATAN</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-check form-check-inline">

                                <input type="checkbox" class="form-check-input pengesahan_kbp medium" value="1" name="akuan_kbp" id="checkbox_akuan" @if(!(\Laratrust::hasRole('clerk'))) onclick="return false;" @endif @if(!empty($pemohon->pengesahan_perkhidmatan_tkh)) checked @endif/>
                                <label class="col-form-label" for="customCheck1">Saya telah menyemak butir-butir perkhidmatan pegawai di atas dan disahkan betul </label>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Nama</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nama_kerani" readonly class="form-control nama_kerani" placeholder="" value="{{ empty($pemohon->pengesahan_perkhidmatan_nama) ? $clerk['name'] : $pemohon->pengesahan_perkhidmatan_nama }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Jawatan</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="jawatan_kerani" readonly class="form-control jawatan_kerani" value="{{ empty($pemohon->pengesahan_perkhidmatan_jawatan) ? $clerk['jawatan'] : $pemohon->pengesahan_perkhidmatan_jawatan }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Caw./Jabatan</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="jabatan_kerani" readonly class="form-control jabatan_kerani" value="{{ empty($pemohon->pengesahan_perkhidmatan_cawangan) ? $clerk['waran_name']['bahagian'].','.$clerk['waran_name']['cawangan'] : $pemohon->pengesahan_perkhidmatan_cawangan }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Tarikh</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="tkh_kerani" readonly class="form-control tkh_kerani" placeholder="" value="{{ empty($pemohon->pengesahan_perkhidmatan_tkh) ? \Carbon\Carbon::parse(Date::now())->format('d-m-Y') : \Carbon\Carbon::parse($pemohon->pengesahan_perkhidmatan_tkh)->format('d-m-Y') }}">
                                </div>
                            </div>
                        </div>
                        @role(['clerk'])
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="button" class="btn btn-primary btn-prev btn-kbp">
                                <i data-feather='send' class="align-middle mr-sm-25 mr-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Hantar</span>
                            </button>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">PERAKUAN KETUA JABATAN</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="1" class="form-check-input medium radio-certified" name="terima_tawaran" id="radiol-1" @if(!(\Laratrust::hasRole('hod'))) onclick="return false;" @endif @if($pemohon->perakuan_ketua_jabatan == 1) checked @endif/>
                                <label class="col-form-label" for="tatatertib"> Diperakui</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input type="radio" value="0" class="form-check-input medium radio-certified" name="terima_tawaran" id="radiol-2" @if(!(\Laratrust::hasRole('hod'))) onclick="return false;" @endif @if(!empty($pemohon->perakuan_ketua_jabatan) && $pemohon->perakuan_ketua_jabatan == 0) checked @endif/>
                                <label class="col-form-label" for="tatatertib"> Tidak Diperakui </label>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                            <div class="form-group col-12">
                                <span class="col-form-label">Ulasan</span>
                                <textarea row=3 type="text" width="100%" id="ulasan_ketua" class="form-control ulasan_ketua" name="ulasan_ketua"  placeholder="Sila Berikan Ulasan Anda">{{ empty($pemohon->perakuan_ketua_jabatan_ulasan) ? '' : $pemohon->perakuan_ketua_jabatan_ulasan }}</textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Nama</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nama-ketua" value="{{ empty($pemohon->perakuan_ketua_jabatan_nama) ? $hod['name'] : $pemohon->perakuan_ketua_jabatan_nama  }}" readonly class="form-control nama-ketua" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Jawatan</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="jawatan-ketua" readonly class="form-control jawatan-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_jawatan) ? $hod['jawatan'] : $pemohon->perakuan_ketua_jabatan_jawatan }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Caw./Jabatan</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="jabatan-ketua" readonly class="form-control jabatan-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_alamat_pejabat) ? $hod['waran_name']['bahagian'].','.$clerk['waran_name']['cawangan'] : $pemohon->perakuan_ketua_jabatan_alamat_pejabat }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <label class="col-form-label" for="first-name">Tarikh</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="tkh-ketua" readonly class="form-control tkh-ketua" placeholder="" value="{{ empty($pemohon->perakuan_ketua_jabatan_tkh) ? \Carbon\Carbon::parse(Date::now())->format('d-m-Y') : \Carbon\Carbon::parse($pemohon->perakuan_ketua_jabatan_tkh)->format('d-m-Y') }}">
                                </div>
                            </div>
                        </div>
                        @role('hod')
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="button" class="btn btn-primary btn-prev btn-hod">
                                <i data-feather='send' class="align-middle mr-sm-25 mr-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Hantar</span>
                            </button>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-md-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-pdf">
                        <i data-feather='download' class="align-middle mr-sm-25 mr-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Muat Turun</span>
                    </button>
                </div>
            </div>
    </div>
    </section>
</div>
@endsection

@section('customJs')
@include('web.sweet-alert-js')
<script src="{{ asset('asset/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('local/view_form/js/page_setting.js') }}"></script>
<script src="{{ asset('local/view_form/js/index.js') }}"></script>
@endsection
