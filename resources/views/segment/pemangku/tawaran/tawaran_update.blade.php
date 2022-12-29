@extends('layouts.main')

@section('CSS')
    @include('segment.layouts.custom_view_links.select2.css.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.css.index')
    @include('segment.layouts.custom_view_links.dropzone.css.index')
    @include('segment.layouts.custom_view_links.toast.css.index')
    @include('segment.layouts.custom_view_links.datatable.css.index')
    @include('segment.layouts.custom_view_links.swal.css.index')
@endsection

@section('customCss')
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">BORANG JKR/UKP/11</h2>
                    <div class="breadcrumb-wrapper">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div id="user-profile">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Nama:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tawaran-name" readonly value="{{$data->pemohonPeribadi->nama}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jawatan:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tawaran-jawatan" readonly value="{{$data->jawatan}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Disiplin:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-disiplin" readonly value="{{$data->pemohonPermohonan->disiplin}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Gred Memangku:</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" id="tawaran-gred-mangku" readonly value="{{$data->pemohonPermohonan->gred}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Pejabat Alamat :<br/>(Pejabat Baru)</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" rows="5" id="tawaran-alamat">{{$data->pemohonPink->alamat ?? ''}}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">No Telefon:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-telefon" readonly value="{{$data->pemohonPeribadi->tel_pejabat}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Emel:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tawaran-emel" readonly value="{{$data->pemohonPeribadi->email}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label">Ketua Bahagian<br>
                            Bahagian Pengurusan Sumber Manusia<br>
                            Cawangan Pengurusan Dasar & Korporat<br>
                            Tingkat 29, Blok G,<br>
                            Ibu Pejabat JKR<br>
                            <span style="font-weight: bold">50480 KUALA LUMPUR</span><br>
                            <span style="font-weight: bold">(u.p. : Urusetia Kenaikan Pangkat - emel: urusetiakenaikanpangkat@jkr.gov.my)</span><br>
                            <span>Fax :03-26188649</span>
                            <br><br>


                            Tuan,<br><br>Merujuk  kepada  surat  Pemberitahuan  Pertukaran:</label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Rujukan Surat:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tawaran-rujukan" value="{{$data->pemohonPink->no_surat ?? ''}}" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label" style="color:red">Adalah Saya {{$data->pemohonPeribadi->nama}}, No. kad pengenalan {{$data->pemohonPeribadi->nokp}}</label>
                        <div class="col-sm-3">
                            <select class="select2 form-select form-control" id="tawaran-setuju">
                                <option value="">-- Sila Pilih --</option>
                                <option value="TL">Setuju</option>
                                <option value="PL">Tidak Setuju</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row notis-tolak" style="background-color:yellow;margin:1px;outline: 2px dotted red;">
                        <label for="" class="col-sm-12 col-form-label">
                            Jika pegawai memilih butang TIDAK BERSETUJU, notifikasi/peringatan dipaparkan kepada pegawai seperti berikut:

                            ‘Berdasarkan kepada Pekeliling Perkhidmatan Awam Bil. 7 Tahun 2010: Sekiranya pegawai menolak tawaran pemangkuan, pihak Lembaga Kenaikan Pangkat Perkhidmatan Pegawai (LKPPA) boleh mengenakan penalti dengan tidak menimbangkan pemangkuan pegawai bagi tempoh enam (6) bulan dari tarikh surat penolakan/tarikh melaporkan diri yang ditetapkan atau satu urusan, yang mana terkemudian.

                        </label>
                    </div>
                    <br><br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="color:red">Ditawarkan pemangkuan ke gred</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-gred-mangku" readonly value="{{$data->pemohonPermohonan->gred}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" style="color:red">Disiplin</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-gred-mangku" readonly value="{{$data->pemohonPermohonan->disiplin}}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label" style="font-weight:bold">
                            2.	Dengan ini saya memahami bahawa sepanjang tempoh pemangkuan ini, prestasi saya akan dinilai untuk tempoh sekurang-kurangnya dua belas (12) bulan dan saya boleh dipertimbangkan untuk kenaikan pangkat selepas daripada tempoh tersebut sekiranya saya menunjukkan prestasi dan pencapaian yang baik di gred jawatan yang dipangku serta memenuhi syarat kenaikan pangkat yang ditetapkan dalam skim perkhidmatan. Saya tidak akan dipertimbangkan kenaikan pangkat sekiranya tidak menunjukkan prestasi dan pencapaian yang baik dalam tempoh pemangkuan. Saya juga akan ditamatkan tempoh pemangkuan sekiranya terlibat dengan tindakan tatatertib, pelanggaran peraturan dan sebagainya.<br><br>

                            3.	Sekiranya saya menolak tawaran pemangkuan ini, saya berhak dikenakan penalti, iaitu tidak dipertimbangkan pemangkuan dalam tempoh enam (6) bulan atau satu urusan pemangkuan dari tarikh surat ini atau satu urusan, yang mana terkemudian.<br><br>

                            Sekian, Terima Kasih
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label">
                            Nama: {{$data->pemohonPeribadi->nama}} <br>
                            No. Kad Pengenalan: {{$data->pemohonPeribadi->nokp}}  <br><br>
                            Tarikh: {{date("d-m-Y")}}
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label">
                            Perhatian:<br><br>

                            1)&emsp;&emsp;&emsp;&emsp; Persetujuan penerimaan pemangkuan ini mestilah dikembalikan ke pejabat ini dalam tempoh 14 hari dari tarikh melaporkan diri.<br><br>

                            2)&emsp;&emsp;&emsp;&emsp;	Sekiranya tarikh penangguhan melebihi empat belas (14) hari, tarikh kuat kuasa pemangkuan pegawai adalah mulai tarikh pegawai kembali melaporkan diri dan menjalankan tugas sepenuh masa di jawatan yang dipangku.<br><br>
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label" style="font-weight:bold">
                            Pengesahan Penerimaan Pemangkuan Oleh Unit / Bahagian Perkhidmatan<br>
                            (pejabat baru)
                        </label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tarikh Berkuatkuasa Pemangkuan <br> (berdasarkan ‘pink form’):</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{ empty($data->pemohonPink->tkh_lapor_diri) ? '' : \Carbon\Carbon::parse($data->pemohonPink->tkh_lapor_diri)->format('d-m-Y') }}" id="tawaran-tkh-kuatkuasa-baru" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tarikh Melaporkan Diri:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{ empty($data->pemohonPink->tkh_lapor_diri) ? '' : \Carbon\Carbon::parse($data->pemohonPink->tkh_lapor_diri)->format('d-m-Y') }}"  id="tawaran-tkh-lapor-diri" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tarikh Mula Bertugas:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-tkh-mula-tugas" value="{{ empty($data->pemohonPink->tkh_lapor_diri) ? '' : \Carbon\Carbon::parse($data->pemohonPink->tkh_lapor_diri)->format('d-m-Y') }}" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tarikh Penangguhan:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-tkh-tangguh-start" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <label for="" class="col-sm-1 col-form-label">Hingga</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="tawaran-tkh-tangguh-end" readonly/>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger" id="padam-tangguh">Padam</button>
                        </div>

                    </div>
                    <div class="form-group row show-surat-tangguh" style="display:none">
                        <label for="" class="col-sm-3 col-form-label">Surat Penangguhan:</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="file" id="tawaran-surat-tangguh" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label">
                            (Tuan/puan diminta untuk melaporkan diri pada tarikh yang telah ditetapkan. Sekiranya penangguhan/pelepasan tuan/puan melebihi 14 hari (termasuk cuti mingguan dan kelepasan am), tarikh kuat kuasa pemangkuan tuan/puan adalah mulai tarikh tuan/puan kembali melaporkan diri dan melaksanakan tugas sepenuh masa di jawatan yang dipangku. Elaun pemangkuan hanya layak dibayar mulai tarikh tuan/puan menjalankan tugas yang dipangku secara sepenuh masa. Semua  penangguhan/pelepasan hendaklah dipersetujui Ketua Jabatan (yang baru) dan salinan kelulusan penangguhan disertakan bersama)
                        </label>
                    </div>
                    @if(empty($data->pemohonPink->jenis_penempatan) || ($data->pemohonPink->jenis_penempatan == 1))
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Ketua Bahagian Perkhidmatan/ Kerani Perkhidmatan:</label>
                        <div class="col-sm-5">
                            <select class="form-select form-control" id="tawaran-ketua-bahagian">
                                <option value="">Please Choose</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Ketua Jabatan:</label>
                        <div class="col-sm-5">
                            <select class="form-select form-control" id="tawaran-ketua-jabatan">
                                <option value="">Please Choose</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($data->pemohonPink->jenis_penempatan) && ($data->pemohonPink->jenis_penempatan == 2))
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Muat Naik Borang JKR/UKP/11 (Kader):</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="file" id="tawaran-borang-ukp11" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12" style="width:100%">
                            @if(!empty($data->pemohonPink->jenis_penempatan) && ($data->pemohonPink->jenis_penempatan == 2))
                            <button class="btn btn-primary" style="width:100%" id="download-tawaran"><i data-feather='download'></i> Muat Turun</button><br/><br/><br/>
                            @endif
                            <button class="btn btn-success" style="width:100%" id="simpan-tawaran"><i data-feather='send'></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="pemohon_id" value="{{$pemohon_id}}">
    <input type="hidden" id="jenis_penempatan" value="{{ $data->pemohonPink->jenis_penempatan }}">
@endsection

@section('JS')
    @include('segment.layouts.custom_view_links.select2.js.index')
    @include('segment.layouts.custom_view_links.datepicker.flatpickr.js.index')
    @include('segment.layouts.custom_view_links.dropzone.js.index')
    @include('segment.layouts.custom_view_links.toast.js.index')
    @include('segment.layouts.custom_view_links.datatable.js.index')
    @include('segment.layouts.custom_view_links.modals.js.index')
    @include('segment.layouts.custom_view_links.swal.js.index')
@endsection

@section('customJs')
    @include('segment.layouts.custom_view_links.customjavascript.index')
    <script src="{{ asset('app_js_helper/segment/pemangku/tawaran/update/settings.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/pemangku/tawaran/update/controller.js') }}"></script>
    <script src="{{ asset('app_js_helper/segment/pemangku/tawaran/update/main.js') }}"></script>

@endsection
