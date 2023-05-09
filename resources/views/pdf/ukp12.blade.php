<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://e-naikpangkat.jkr.gov.my/asset/css/bootstrap.css">
    <style>
        body {
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            background-color: white;
            color: black;
        }

        .normal-size {
            font-size: 14px;
        }

        .img-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        .centerCell {
            text-align: center;
            vertical-align: middle !important;
            font-weight: bold !important;
        }
        .center {
            text-align: center;
            vertical-align: middle !important;
            font-weight: solid;
        }

        .top-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
            border-top-style: solid;
            border-top-width: 1px;
        }

        .side-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
        }

        .bottom-border {
            border-left-style: solid;
            border-left-width: 1px;
            border-right-style: solid;
            border-right-width: 1px;
            border-bottom-style: solid;
            border-bottom-width: 1px;
        }

        .word-line {
            line-height: 15px;
        }

        .box-small {
            border-style: solid;
            border-width: 1px;
            width: 20px; height: 20px;
            display: inline-block;
            text-align: center;
        }

        .box-normal {
            border-style: solid;
            border-width: 1px;
            width: 30px; height: 30px;
            display: inline-block;
            text-align: center;
        }

        .ow {
            overflow-wrap: break-word;
            word-wrap: break-word;
            hyphens: auto;
            white-space: normal; //this is the one that gets you all the time
        }

        div.a {
            text-align: center;
        }
        table, th, td {
            table-layout: fixed;
            width: 100% ;
            /*border: 1px solid black;*/
            font-size: 14px;
        }

        .width-25 {
            width: 25%;
        }

        i {
            content: "\2713";
        }
    </style>
  </head>
  <body>
    <table>
        <tbody>
            <tr style="text-align:right">
                <td></td>
                <td></td>
                <td >

                </td>

                <td></td>

                <td colspan="4" style="text-align: center">
                    <img src="https://e-naikpangkat.jkr.gov.my/images/jkr_logo.png" width="70" height="50">
                </td>


                <td></td>
                <td></td>
                <td></td>
                <td style="line-height: 12px;">
                    <span style="font-weight:bold; font-size: 16px; padding-bottom: 0px;">JKR/UKP/12</span><br/>
                    <span style="font-style:italic; font-weight:bold; font-size: 10px;">Pindaan 1/2021</span>
                </td>
            </tr>
            <tr style="line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size">Pengarah</span><br/>
                    <span class="normal-size">Cawangan Dasar & Pengurusan Korporat</span><br/>
                    <span class="normal-size">Ibu Pejabat JKR Malaysia</span><br/>
                    <span class="normal-size">Tingkat 29, Blok G, Menara Kerja Raya</span><br/>
                    <span class="normal-size">No. 6, Jalan Sultan Salahuddin</span><br/>
                    <span class="normal-size"><strong>50480 KUALA LUMPUR</strong></span><br/>
                    <span class="normal-size">(u.p: Urus Setia Kenaikan Pangkat JKR)</span>
                </td>
                <td colspan="8" style="text-align: right;">
                    <img src="{{ asset('files/foto-'.$peribadi->nokp.'.jpg') }}"
                        alt="" width="120" height="130">
                </td>

            </tr>
            <tr>
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr>
                <td colspan="2"><span class="normal-size">Tuan / Puan,</span></td>
                <td colspan="10"></td>
            </tr>
            <tr>
                <td style="height: 10px;" colspan="12"></td>
            </tr>

            <tr>
                <td colspan="4"><span class="normal-size"><strong>URUSAN</strong></span></td>
                <td colspan="8">
                    <span class="normal-size"><strong>: </strong></span>
                    <span class="normal-size"><strong>PEMANGKUAN GRED </strong></span>
                    <span class="normal-size"><strong>{{ $borang->gred }}</strong></span>
                </td>

            </tr>
            <tr>
                <td colspan="4"><span class="normal-size"><strong>JAWATAN</strong></span></td>
                <td colspan="8">
                    <span class="normal-size"><strong>: </strong></span>
                    <span class="normal-size"><strong>{{ $pemohon->jawatan }}</strong></span>
                </td>
            </tr>
            <tr>
                <td style="height: 10px;" colspan="12"></td>
            </tr>

            <tr style="line-height: 15px;">
                <td colspan="12">
                    <span class="normal-size">Saya dengan sukacita memohon untuk dipertimbangkan bagi urusan seperti yang dinyatakan di atas. Butir-butir peribadi saya adalah seperti berikut: </span>
                </td>
            </tr>
            <tr>
                <td style="height: 10px;" colspan="12"></td>
            </tr>

            <tr>
                <td><span class="normal-size"><strong>I.</strong></span></td>
                <td colspan="11"><span class="normal-size"><strong>BUTIR-BUTIR PERIBADI</strong></span></td>
            </tr>
            {{--  --}}
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px; height: 20px;">
                <td colspan="12" style="height: 10px;"></td>
            </tr>

            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px;">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px;">Nama</span>
                    <span class="normal-size"> : </span>
                    <span class="normal-size">{{ strtoupper(htmlspecialchars_decode($peribadi->nama)) }}</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">
                <td colspan="12"  style="height: 10px;"></td>
            </tr>
            {{--  --}}
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px;">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px;">
                <td colspan="6">
                    <span class="normal-size" style="padding-left: 5px;">No. Kad Pengenalan : (Lama) </span>
                    <span class="normal-size">{{ empty($peribadi->nokp_lama) ? 'TIDAK BERKENAAN' :  $peribadi->nokp_lama}}</span>
                </td>
                <td colspan="6">
                    <span class="normal-size"> (Baru) </span>
                    <span class="normal-size">{{ $peribadi->nokp }}</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            {{--  --}}
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px;">
                <td colspan="12" style="height: 10px;"></td>
            </tr>

            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Jawatan dan gred sekarang</span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">{{ $pemohon->jawatan }} {{ $pemohon->gred }}</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh lantikan perkhidmatan (semasa J41)</span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">{{ empty($pemohon->tkh_lantikan_j41) ? '01-01-0001' : \Carbon\Carbon::parse($pemohon->tkh_lantikan_j41)->format('d-m-Y') }}</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh * disahkan jawatan / naik pangkat terkini </span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">{{ empty($pemohon->tkh_sah_perkhidmatan) ? '01-01-0001' : \Carbon\Carbon::parse($pemohon->tkh_sah_perkhidmatan)->format('d-m-Y') }}</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Umur persaraan wajib</span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">{{ $peribadi->pilihan_bersara_wajib }} </span>
                </td>
            </tr>

            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            {{--  --}}
            <tr class="side-border" >
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px;">Pengesahan * Cuti Tanpa Gaji / Cuti Separuh Gaji / Cuti Belajar Sepanjang Pekhidmatan</span>
                </td>
            </tr>
            <tr class="side-border" >
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr class="side-border">
                <td colspan="2">
                    <span class="normal-size" style="padding-left: 5px; padding-right: 5px;">Ada</span>
                    <span class="normal-size box-small">{{ $cutis->count() > 0 ? '/' : '' }}</span>

                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Tiada</span>
                    <span class="normal-size box-small">{{ $cutis->count() == 0 ? '/' : '' }}</span>
                </td>
                <td colspan="8"></td>
            </tr>
            <tr class="side-border" style="height: 20px;">
                <td colspan="12"></td>
            </tr>
            <tr class="side-border">
                <td ></td>
                <td colspan="10">
                    <table border="1">
                        <thead style="font-size: 14px; text-align: center;">
                            <th>Cuti</th>
                            <th>Tarikh Mula</th>
                            <th>Tarikh Tamat</th>
                        </thead>
                        <tbody class="word-line">
                            @foreach ($cutis as $cuti)
                            <tr>
                                <td><span class="normal-size">{{ $cuti->jenis }}</span></td>
                                <td><span class="normal-size">{{ \Carbon\Carbon::parse($cuti->tkh_mula)->format('d-m-Y')  }}</span></td>
                                <td><span class="normal-size">{{ \Carbon\Carbon::parse($cuti->tkh_akhir)->format('d-m-Y')  }}</span></td>
                            </tr>
                            @endforeach
                            @if($cutis->count() == 0)
                            <tr>
                                <td><span class="normal-size">Cuti Tanpa Gaji</span></td>
                                <td><span class="normal-size"></span></td>
                                <td><span class="normal-size"></span></td>
                            </tr>
                            <tr>
                                <td><span class="normal-size">Cuti Separuh Gaji </span></td>
                                <td><span class="normal-size"></span></td>
                                <td><span class="normal-size"></span></td>
                            </tr>
                            <tr>
                                <td><span class="normal-size">Cuti Belajar Bergaji Penuh / Cuti Belajar Separuh Gaji</span></td>
                                <td><span class="normal-size"></span></td>
                                <td><span class="normal-size"></span></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </td>
                <td></td>
            </tr>
            <tr class="side-border" style="height: 20px;">
                <td colspan="12"></td>
            </tr>

            <tr class="side-border">
                <td colspan="12"><span class="normal-size" style="font-style: italic; font-weight: bold; padding-left: 5px;">* Sila Tandakan Kotak</span></td>
            </tr>
            <tr class="side-border">
                <td colspan="12"><span class="normal-size" style="font-style: italic; font-weight: bold; padding-left: 5px;">* Surat Kelulusan Cuti yang disahkan perlu disertakan bersama.</span></td>
            </tr>

            <tr class="bottom-border" >
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            {{--  --}}
            <tr class="side-border">
                <td colspan="12" style="height: 10px;"></td>
            </tr>

            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="font-weight: bold; padding-left: 5px;">Pengesahan Butir-butir Perkhidmatan</span>
                </td>
            </tr>
            <tr class="side-border">
                <td style="text-align: right;"><span  class="box-small">@if(!empty($pemohon->pengesahan_perkhidmatan)){{ $pemohon->pengesahan_perkhidmatan == 1 ? '/' : '' }}@endif</span></td>
                <td colspan="11">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px;">Saya telah menyemak butir-butir perkhidmatan pegawai di atas dan disahkan betul</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 20px;"></td>
            </tr>

            <tr class="side-border">
                <td></td>
                <td style="normal-size">
                    <span>Nama</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="9">{{ $pemohon->pengesahan_perkhidmatan_nama ? strtoupper($pemohon->pengesahan_perkhidmatan_nama) : ''}}</td>
            </tr>

            <tr class="side-border">
                <td></td>
                <td style="normal-size">
                    <span>Jawatan</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="9">{{ $pemohon->pengesahan_perkhidmatan_jawatan ?? ''}}</td>
            </tr>

            <tr class="side-border">
                <td></td>
                <td style="normal-size">
                    <span>Caw./Jabatan</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="9">{{ $pemohon->pengesahan_perkhidmatan_cawangan ?? ''}}</td>
            </tr>

            <tr class="side-border">
                <td></td>
                <td style="normal-size">
                    <span>Tarikh</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="9">{{ empty($pemohon->pengesahan_perkhidmatan_tkh) ? '' : \Carbon\Carbon::parse($pemohon->pengesahan_perkhidmatan_tkh)->format('d-m-Y')}}</td>
            </tr>

            <tr class="bottom-border">
                <td colspan="12" style="height: 30px;"></td>
            </tr>
            <tr class="">
                <td colspan="12">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">* potong mana yang tidak berkenaan</span>
                </td>
            </tr>

        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr class="top-border">
                <td style="height: 10px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="side-border" style="height: 80px;">
                <td colspan="3" style="vertical-align: top;" class="word-line">
                    <span class="normal-size" style="padding-left: 5px; ">Alamat Tempat : </span>
                    <span class="normal-size" style="padding-left: 5px; ">Bertugas</span>
                </td>
                <td colspan="5">
                    <span class="normal-size ow" style="">{{ strtoupper($pemohon->alamat_pejabat) }}</span>
                </td>
                <td colspan="4"></td>

            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 10px;"></td>
            </tr>

            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">No. Telefon (Pejabat) : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">{{ $peribadi->tel_pejabat }}</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">No. Faksimili : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">{{ $peribadi->fax_pejabat }}</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">No. Telefon (Bimbit) : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">{{ $peribadi->tel_bimbit }}</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">E-mel : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">{{ $peribadi->email }}</span>
                </td>
            </tr>
            <tr class="bottom-border">
                <td colspan="12" style="height: 10px;"> </td>
            </tr>
            <tr class="side-border"><td colspan="12" style="height: 10px;"></td></tr>
            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px; ">Pengisytiharan Harta</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="5">
                    <span class="normal-size" style="padding-left: 5px; ">Tarikh Akhir Pengisytiharan Harta Terkini :  </span>
                </td>
                <td colspan="7">
                    <span class="normal-size" style="">{{ empty($harta->tkh_akhir_pengisytiharan) ? '01-01-0001' : \Carbon\Carbon::parse($harta->tkh_akhir_pengisytiharan)->format('d-m-Y') }}</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 20px;"> </td>
            </tr>

            <tr class="side-border">
                <td colspan="12" class="word-line">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) <!--yang disahkan--> perlu disertakan bersama</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 20px;"> </td>
            </tr>

            <tr class="side-border">
                <td colspan="12" class="word-line">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">* Sila pastikan kelulusan Pengisytiharan Harta adalah sah dan tidak melebihi dari lima (5) tahun dari tarikh Pengisytiharan Harta terakhir</span>
                </td>
            </tr>
	      <tr class="side-border">
                <td colspan="12" style="height: 20px;"> </td>
            </tr>


            <tr class="side-border">
                <td colspan="12" class="word-line">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">* Sila pastikan tempoh sah laku masih berbaki sekurang-kurangnya 8 bulan dari tarikh permohonan ini</span>
                </td>
            </tr>

            <tr class="bottom-border">
                <td colspan="12" style="height: 10px;"> </td>
            </tr>
            <tr class="">
                <td colspan="12" style="height: 50px;"> </td>
            </tr>

            <tr class="">
                <td><span class="normal-size" style="font-weight: bold;">II. </span></td>
                <td colspan="11">
                    <span class="normal-size" style="font-weight: bold;">UNTUK TINDAKAN URUS SETIA KENAIKAN PANGKAT</span>
                </td>
            </tr>
            <tr class="">
                <td colspan="12" style="height: 50px;"> </td>
            </tr>

            <tr class="top-border">
                <td colspan="12" style="height: 10px;"> </td>
            </tr>

            <tr class="side-border">
                <td colspan="4" style="vertical-align: top;">
                    <span class="normal-size" style="padding-left: 5px;">Markah LNPT Terkini : </span><br/>
                    <span class="normal-size" style="padding-left: 5px;">(Tiga (3) Tahun Terakhir)</span>
                </td>
                <td colspan="8">
                    <table border="1" style="padding-right: 5px;">
                        @php
                            $year = \Carbon\Carbon::parse(Date::now())->format('Y');
                        @endphp
                        <tbody>
                            <tr style="text-align: center;">
                                <td>Tahun</td>
                                @foreach($lnpt as $m)
                                <td class="">{{ $m->tahun }}</td>
                                @endforeach
                                @if(empty($lnpt))
                                <td></td>
                                <td></td>
                                <td></td>
                                @endif
                            </tr>
                            <tr style="text-align: center;">
                                <td>Markah</td>
                                @foreach($lnpt as $p)
                                    <td class="cell">
                                        {{ $p->purata }}
                                    </td>
                                    @endforeach
                                    @if(empty($lnpt))
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @endif
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 10px;"> </td>
            </tr>
	     <!--
            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px; font-weight: bold; font-style: italic;">* Pegawai KADER perlu memajukan salinan LNPT yang telah disahkan oleh pejabat</span>
                </td>
            </tr>
            -->
            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px; font-weight: bold; font-style: italic;">* Sekiranya menggunakan Laporan Nilaian Prestasi Khas (LNPK), LNPK tersebut perlu disahkan dan disertakan bersama.</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 20px;"> </td>
            </tr>

            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Pengesahan Tindakan Tatatertib	: </span>
                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Ada</span>
                    <span class="normal-size box-small">@if($tatatertib){{ $tatatertib->pengesahan_tindakan == 1 ? '/' : '' }}@endif</span>

                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Tiada</span>
                    <span class="normal-size box-small">@if($tatatertib){{ $tatatertib->pengesahan_tindakan == 0 ? '/' : '' }}@endif</span>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 10px;"> </td>

            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Jenis Hukuman (Jika Ada) : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">@if($tatatertib){{ $tatatertib->jenis_hukuman }}@endif</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh Hukuman : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">
                        @if($tatatertib){{ empty($tatatertib->tkh_hukuman) ? '' : \Carbon\Carbon::parse($tatatertib->tkh_hukuman)->format('d-m-Y') }}@endif
                    </span>
                </td>
            </tr>
            <tr class="bottom-border">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr class="">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="">
                <td><span class="normal-size" style="font-weight: bold;">III.</span></td>
                <td colspan="11"><span class="normal-size" style="font-weight: bold;">BUTIR-BUTIR CALON UNTUK TAPISAN KEUTUHAN</span></td>
            </tr>
            <tr class="">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <span class="normal-size" style="font-weight: bold;">PERINGATAN : </span>
                </td>
            </tr>
            <tr class="">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <span class="normal-size">Semua ruangan hendaklah dipenuhkan. Jika tidak berkenaan tulis </span> <span class="normal-size" style="font-weight: bold;">“TIDAK BERKENAAN”</span><span class="normal-size">, tiada, tulis </span><span class="normal-size" style="font-weight: bold;">“TIADA”</span><span class="normal-size">.</span>
                </td>
            </tr>
            <tr class="">
                <td colspan="12" style="height: 10px;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <table>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td colspan="2">
                                    GELARAN
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">{{ $peribadi->gelaran }}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td colspan="2">
                                    NAMA
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">{{ strtoupper(htmlspecialchars_decode($peribadi->nama)) }}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="4">NO. KAD PENGENALAN</td>
                                <td style="text-align: center;">:</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">{{ $peribadi->nokp }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">{{ empty($peribadi->nokp_lama) ? 'TIADA' : $peribadi->nokp_lama}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">(Baru)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">(Lama)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td colspan="2">JANTINA</td>

                                <td style="text-align: center;">:</td>
                                <td>@if(strtoupper($peribadi->jantina) == 'L'){{ 'LELAKI' }}@elseif (strtoupper($peribadi->jantina) == 'P'){{ 'PEREMPUAN' }}@endif</td>
                                <td></td>
                                <td></td>
                                <td colspan="2">BANGSA</td>
                                <td style="text-align: center;">:</td>
                                <td>{{ $peribadi->bangsa }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td colspan="2">AGAMA</td>

                                <td style="text-align: center;">:</td>
                                <td>{{ $peribadi->agama }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td colspan="4">TARIKH/TEMPAT LAHIR</td>

                                <td style="text-align: center;">:</td>
                                <td colspan="4">{{ \Carbon\Carbon::parse($peribadi->tkh_lahir)->format('d-m-Y') }} / {{ $peribadi->negeri_lahir }}</td>

                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td colspan="4">JAWATAN PEKERJAAN</td>

                                <td style="text-align: center;">:</td>
                                <td colspan="4">{{ $pemohon->jawatan }} {{ $pemohon->gred }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="5"><!--(Contoh: Jurutera Awam J52)--></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td colspan="2">
                                    STATUS
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">{{ $peribadi->taraf_perkahwinan}}</td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td colspan="2">
                                    GAJI HAKIKI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">RM {{ $pemohon->gaji_hakiki }}</td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td colspan="3">
                                    ALAMAT PEJABAT
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="7"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">{{ strtoupper($peribadi->alamat_pejabat) }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td colspan="3">
                                    ALAMAT RUMAH
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="7"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">{{  strtoupper($peribadi->alamat)  }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>12.</td>
                                <td colspan="4">
                                    NAMA SUAMI/ISTERI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">{{ $pasangan ? strtoupper($pasangan->nama) : '' }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>13.</td>
                                <td colspan="6">
                                    JAWATAN/PEKERJAAN SUAMI/ISTERI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">{{ $pasangan ? strtoupper($pasangan->pekerjaan) : '' }}</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>14.</td>
                                <td colspan="6">
                                    ALAMAT PEJABAT SUAMI/ISTERI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">@if($peribadi->taraf_perkahwinan == 'KAHWIN') {{ $pasangan ? (empty($pasangan->alamat_pejabat) ? strtoupper($peribadi->alamat) : strtoupper($pasangan->alamat_pejabat)) :  '' }} @else {{ '' }} @endif</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr class="">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <table>
                        <tbody>
                            <tr class="">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>15.</td>
                                <td colspan="11">
                                    JAWATAN/PENEMPATAN SEPANJANG PERKHIDMATAN </td>
                            </tr>
                        </tbody>

                </td>
            </tr>
        </tbody>
    </table>
                    @php
                        $iteration = 0;

                        //print_r($chunk);
                    @endphp
                    @if(count($perkhidmatans) == 0)
                    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
                        <thead>
                            <th style="text-align: center; width: 25%;">BIL.</th>
                            <th style="text-align: center;">GELARAN JAWATAN</th>
                            <th style="text-align: center;">PENEMPATAN</th>
                            <th style="text-align: center; width: 60%">TAHUN BERKHIDMAT</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="height: 30px ; width: 25%;"></td>
                                <td></td>
                                <td></td>
                                <td style="width: 60%"></td>
                            </tr>
                            <tr>
                                <td style="height: 30px ; width: 25%;"></td>
                                <td></td>
                                <td></td>
                                <td style="width: 60%"></td>
                            </tr>
                            <tr>
                                <td style="height: 30px ; width: 25%;"></td>
                                <td></td>
                                <td></td>
                                <td style="width: 60%"></td>
                            </tr>
                            <tr>
                                <td style="height: 30px ; width: 25%;"></td>
                                <td></td>
                                <td></td>
                                <td style="width: 60%"></td>
                            </tr>
                            <tr>
                                <td style="height: 30px ; width: 25%;"></td>
                                <td></td>
                                <td></td>
                                <td style="width: 60%"></td>
                            </tr>
                        </tbody>
                    </table>
                    @elseif(count($perkhidmatans) > 15)
                    @php
                        $chunk = array_chunk($perkhidmatans->toArray(), 10, false);
                    @endphp
                    @foreach ($chunk as $little)
                    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
                        <thead>
                            <th style="text-align: center; width: 25%;">BIL.</th>
                            <th style="text-align: center;">GELARAN JAWATAN</th>
                            <th style="text-align: center;">PENEMPATAN</th>
                            <th style="text-align: center; width: 60%">TAHUN BERKHIDMAT</th>
                        </thead>
                        <tbody>

                        <tbody>
                            @foreach ($little as $pengalaman)
                            <tr style="font-size: 9px;">
                                <td style="width: 25%; text-align: center;">{{ ++$iteration }}</td>
                                <td>{{ $pengalaman['jawatan'] ? strtoupper($pengalaman['jawatan']) : '' }}</td>
                                <td>{{ strtoupper($pengalaman['penempatan']) }}</td>
                                <td style="width: 60%">{{  \Carbon\Carbon::parse($pengalaman['tkh_mula_berkhidmat'])->format('Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="page-break"></div>
                    @endforeach
                    @else
                    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
                        <thead>
                            <th style="text-align: center; width: 25%;">BIL.</th>
                            <th style="text-align: center;">GELARAN JAWATAN</th>
                            <th style="text-align: center;">PENEMPATAN</th>
                            <th style="text-align: center; width: 60%">TAHUN BERKHIDMAT</th>
                        </thead>
                        <tbody>

                        <tbody>
                            @foreach ($perkhidmatans as $pengalaman)
                            <tr>
                                <td style="height: 30px; width: 25%; text-align: center;">{{ ++$iteration }}</td>
                                <td>{{ $pengalaman['jawatan'] ? strtoupper($pengalaman['jawatan']) : '' }}</td>
                                <td>{{ strtoupper($pengalaman['penempatan']) }}</td>
                                <td style="width: 60%">{{  \Carbon\Carbon::parse($pengalaman['tkh_mula_berkhidmat'])->format('Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div style="height: 50px"></div>
                    <table>
                        <tbody>
                            <tr class="">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table>
                                        <tbody>
                                            <tr class="">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td>16.</td>
                                                <td colspan="11">
                                                    JAWATAN YANG DIPEGANG DALAM PERTUBUHAN/LAIN-LAIN </td>
                                            </tr>
                                        </tbody>

                                </td>
                            </tr>
                        </tbody>
                    </table>
    @php
        $iteration = 0;
        //print_r($chunk);
    @endphp
    @if(count($sumbangan) == 0)
    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
        <thead>
            <th style="text-align: center;" class="width-25">BIL.</th>
            <th style="text-align: center;">SUMBANGAN/JAWATANKUASA TEKNIKAL</th>
            {{-- <th style="text-align: center;">TEMPAT</th> --}}
            <th style="text-align: center; width: 50%">TAHUN</th>
        </thead>
        <tbody>
            <tr>
                <td style="height: 30px;" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="height: 30px" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="height: 30px" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="height: 30px" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="height: 30px" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td style="height: 30px" class="width-25"></td>
                <td></td>
                {{-- <td></td> --}}
                <td style="width: 50%"></td>
            </tr>
        </tbody>
    </table>
    @elseif (count($sumbangan) > 15)
    @php
                        $chunk = array_chunk($sumbangan->toArray(), 10, false);
                    @endphp
    @foreach ($chunk as $little)
    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
        <thead>
            <th style="text-align: center;" class="width-25">BIL.</th>
            <th style="text-align: center;">SUMBANGAN/JAWATANKUASA TEKNIKAL</th>
            {{-- <th style="text-align: center;">TEMPAT</th> --}}
            <th style="text-align: center; width: 50%">TAHUN</th>
        </thead>
        <tbody>
            @foreach ($little as $sumbang)
                                            <tr>
                                                <td style="height: 30px; text-align: center;" class="width-25">{{ ++$iteration }}</td>
                                                <td>{{ strtoupper($sumbang['sumbangan']) }}</td>
                                                {{-- <td>{{ $sumbang['tempat'] }}</td> --}}
                                                <td style="width: 50%">{{ \Carbon\Carbon::parse($sumbang['tkh_peristiwa'])->format('Y') }}</td>
                                            </tr>
                                            @endforeach
        </tbody>
    </table>
    <div class="page-break"></div>
    @endforeach
    @else
    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
        <thead>
            <th style="text-align: center;" class="width-25">BIL.</th>
            <th style="text-align: center;">SUMBANGAN/JAWATANKUASA TEKNIKAL</th>
            {{-- <th style="text-align: center;">TEMPAT</th> --}}
            <th style="text-align: center; width: 50%">TAHUN</th>
        </thead>
        <tbody>
            @foreach ($sumbangan as $sumbang)
                                            <tr>
                                                <td style="height: 30px; text-align: center;" class="width-25">{{ ++$iteration }}</td>
                                                <td>{{ strtoupper($sumbang['sumbangan']) }}</td>
                                                {{-- <td>{{ $sumbang['tempat'] }}</td> --}}
                                                <td style="width: 50%">{{ \Carbon\Carbon::parse($sumbang['tkh_peristiwa'])->format('Y') }}</td>
                                            </tr>
                                            @endforeach
        </tbody>
    </table>
    @endif
    {{-- <table border="1">
                                        <thead>
                                            <th style="text-align: center;" class="width-25">BIL.</th>
                                            <th style="text-align: center;">JAWATAN</th>
                                            <th style="text-align: center;">NAMA PERTUBUHAN</th>
                                            <th style="text-align: center; width: 50%">TAHUN</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
        <div style="height: 50px"></div>
                                    <table>
                                        <tbody>
                                            <tr class="">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="11">
                                                    <table>
                                                        <tbody>
                                                            <tr class="">
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>

                                                            </tr>
                                                            <tr>
                                                                <td>17.</td>
                                                                <td colspan="11">REKOD AKADEMIK</td>
                                                            </tr>
                                                        </tbody>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="1" style="table-layout:fixed; width:85%; margin-left:110px;">
                                        <tr>
                                            <th style="text-align: center;" class="width-25">BIL.</th>
                                            <th style="text-align: center;">KELULUSAN
                                                <span style="font-style: italic;">(Cth: B.Eng(Hons)Civil Eng.)
                                                MSc. (Project Management)</span></th>
                                            <th style="text-align: center; width: 75%">INSTITUT PUSAT PENGAJIAN TINGGI</th>
                                            <th style="text-align: center; width: 50%">TAHUN</th>
                                        </tr>

                                        @php
                                            $iteration = 0
                                        @endphp
                                        <tbody>
                                            @foreach ($akademiks as $a)
                                                <tr>
                                                    <td style="height: 30px; text-align:center;" class="width-25">
                                                        {{ ++$iteration }}
                                                    </td>
                                                    <td>{{ $a['nama_sijil'] }}</td>
                                                    <td style="width: 75%">{{ strtoupper($a['nama_insititusi']) }}</td>
                                                    <td style="width: 50%">{{ empty($a['tkh_kelulusan']) ? '' : \Carbon\Carbon::parse($a['tkh_kelulusan'])->format('Y') }}</td>
                                                </tr>
                                            @endforeach
                                            @if(count($akademiks) == 0)
                                            <tr>
                                                <td style="height: 30px; text-align:center;" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr class="">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <table>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>18.</td>
                                <td colspan="11">REKOD KELAYAKAN PROFESSIONAL DAN PENDAFTARAN DENGAN BADAN PROFESIONAL</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1">
                                        <thead>
                                            <th style="text-align: center;" class="width-25">BIL.</th>
                                            <th style="text-align: center;" >KELAYAKAN PROFESIONAL /PENDAFTARAN DENGAN BADAN
                                                PROFESIONAL
                                                <span style="font-style: italic;">(Cth: Arkitek Profesional (Ar.), Jurutera Profesional (Ir.), Juruukur Bahan Berdaftar (Sr.),Graduate Member)</span></th>
                                            <th style="text-align: center; width: 75%;">BADAN PROFESIONAL YANG DIIKTIRAF</th>
                                            <th style="text-align: center; width: 75%;">NO PENDAFTARAN</th>
                                            <th style="text-align: center; width: 50%">TAHUN</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($profesionals as $pro)
                                                <tr>
                                                    <td style="height: 30px; text-align: center;" class="width-25">{{ $loop->iteration }}</td>
                                                    <td>{{ $pro->nama_sijil }}</td>
                                                    <td style="width: 75%">{{ strtoupper($pro->badan_professional) }}</td>
                                                    <td style="width: 75%">{{ strtoupper($pro->no_pendaftaran) }}</td>
                                                    <td style="width: 50%">{{ empty($pro->tkh_kelulusan) ? '' : \Carbon\Carbon::parse($pro->tkh_kelulusan)->format('Y') }}</td>
                                                </tr>
                                            @endforeach
                                            @if($profesionals->count() == 0)
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
                                                <td></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 75%"></td>
                                                <td style="width: 50%"></td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <tr>

                                <td colspan="12" style="height: 50px"></td>

                            </tr>
                            <tr>
                                <td>19.</td>
                                <td colspan="11">REKOD PENSIJILAN KEKOMPETENAN</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1">
                                        <thead>
                                            <th style="text-align: center; width: 15%" class="">BIL.</th>
                                            <th style="text-align: center;" >PENSIJILAN KEKOMPETENAN

                                                <span style="font-style: italic;">(Cth: Kejuruteraan Struktur Bangunan, Kerja Sivil, Senibina Lestari dll. )</span></th>

                                            <th style="text-align: center; width: 25%">TAHAP</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($kompetenans as $k)
                                            <tr>
                                                <td style="height: 30px; width: 15%; text-align: center;">{{ $loop->iteration }}</td>
                                                <td>{{ strtoupper($k->nama_sijil) }}</td>
                                                <td class="width-25">{{ $k->tahap }}</td>
                                            </tr>
                                            @endforeach
                                            @if($kompetenans->count() == 0)
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%" ></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>

                                <td colspan="12" style="height: 50px"></td>

                            </tr>
                            <tr>
                                <td>20.</td>
                                <td colspan="11">PENGIKTIRAFAN</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1">
                                        <thead>
                                            <th style="text-align: center; width: 15%" class="">BIL.</th>
                                            <th style="text-align: center;" >PENGIKTIRAFAN
                                                <ul style="font-style: italic;">
                                                    <li>APC/PPC/Pingat</li>
                                                    <li>Anugerah Umum</li>
                                                </ul>
                                            </th>
                                            <th style="text-align: center; width: 25%">TAHUN</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengiktirafans as $sijil)
                                                <tr>
                                                    <td style="height: 30px; text-align: center; width: 15%">{{ $loop->iteration }}</td>
                                                    <td>{{ $sijil->jenis ? strtoupper($sijil->jenis) : '' }}</td>
                                                    <td class="width-25">{{ empty($sijil->tkh_mula) ? '' : \Carbon\Carbon::parse($sijil->tkh_mula)->format('Y') }}</td>
                                                </tr>
                                            @endforeach
                                            @if($pengiktirafans->count() == 0)
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%"></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            <tr>
                                                <td style="height: 30px; width: 15%" ></td>
                                                <td></td>
                                                <td class="width-25"></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;" class="normal-size">
                <td>IV.</td>
                <td colspan="11">SURAT AKUAN PINJAMAN PENDIDIKAN INSTITUSI / TABUNG PENDIDIKAN</td>

            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr style="" class="normal-size">
                <td></td>
                <td colspan="11">Saya {{ $peribadi->nama }} No.K.P.: {{ $peribadi->nokp }} mengesahkan bahawa :</td>

            </tr>
            <tr>
                <td colspan="12" style="height: 10px"></td>
            </tr>
            <tr>
                <td></td>
                <td><span class="box-normal normal-size">{{ $akuan_pinjaman->status == 0 ? '/' : '' }}</span></td>
                <td colspan="10">
                    <span class="normal-size"> Saya tidak ada mengambil pinjaman pendidikan daripada mana-mana
                    institusi / tabung pendidikan;</span>
                </td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr>
                <td></td>
                <td><span class="box-normal normal-size">{{ $akuan_pinjaman->status == 1 ? '/' : '' }}</span></td>
                <td colspan="10">
                    <span class="normal-size">Saya ada mengambil pinjaman pendidikan dan saya mengesahkan masih belum membuat bayaran;</span>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6">
                    <table border="1">
                        <tbody>
                            <tr>
                                <td>Institusi/tabung pendidikan</td>
                                <td>{{ $akuan_pinjaman->status == 1 ? strtoupper($akuan_pinjaman->nama_institusi) : '' }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 1 ? \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_pinjaman)->format('d-m-Y') : '' }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 1 ? 'RM '.$akuan_pinjaman->jumlah_pinjaman : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr>
                <td></td>
                <td><span class="box-normal normal-size">{{ $akuan_pinjaman->status == 2 ? '/' : '' }}</span></td>
                <td colspan="10">
                    <span class="normal-size">Saya ada mengambil pinjaman pendidikan dan pada masa ini sedang membuat pembayaran secara bulanan melalui pembayaran tunai / potongan gaji;</span>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6">
                    <table border="1">
                        <tbody>
                            <tr>
                                <td>Institusi/tabung pendidikan</td>
                                <td>{{ $akuan_pinjaman->status == 2 ? strtoupper($akuan_pinjaman->nama_institusi) : '' }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 2 ? \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_pinjaman)->format('d-m-Y') : '' }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 2 ? 'RM '.$akuan_pinjaman->jumlah_pinjaman : '' }}</td>
                            </tr>
                            <tr>
                                <td>Bayaran mulai (Tahun)</td>
                                <td>{{ $akuan_pinjaman->status == 2 ? \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_bayaran)->format('d-m-Y') : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr>
                <td></td>
                <td><span class="box-normal normal-size">{{ $akuan_pinjaman->status == 3 ? '/' : '' }}</span></td>
                <td colspan="10">
                    <span class="normal-size">Saya ada mengambil pinjaman pendidikan dan saya telahpun menyelesaikan sepenuhnya pinjaman;</span>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6">
                    <table border="1">
                        <tbody>
                            <tr>
                                <td>Institusi/tabung pendidikan</td>
                                <td>{{ $akuan_pinjaman->status == 3 ? strtoupper($akuan_pinjaman->nama_institusi) : '' }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 3 ? \Carbon\Carbon::parse($akuan_pinjaman->tkh_mula_pinjaman)->format('d-m-Y') : '' }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Pinjaman</td>
                                <td>{{ $akuan_pinjaman->status == 3 ? 'RM '.$akuan_pinjaman->jumlah_pinjaman : '' }}</td>
                            </tr>
                            <tr>
                                <td>Selesai Pembayaran (Tahun)</td>
                                <td>{{ $akuan_pinjaman->status == 3 ? \Carbon\Carbon::parse($akuan_pinjaman->tkh_selesai_bayaran)->format('d-m-Y') : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="4"></td>
            </tr>
            <tr>

                <td colspan="12" style="height: 30px"></td>

            </tr>
            <tr>
                <td></td>
                <td colspan="11"><span style="font-weight: bold; font-style: italic;">*Disertakan Penyata Bayaran Pinjaman terkini  atau Surat Pengesahan Menyelesaikan Pinjaman Pendidikan</span></td>
            </tr>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;" class="normal-size">
                <td>V.</td>
                <td colspan="11">PERAKUAN PEGAWAI</td>

            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr style="" class="normal-size">
                <td></td>
                <td colspan="11">Saya dengan ini mengesahkan bahawa saya:</td>

            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr class="normal-size">
                <td></td>
                <td>a)</td>
                <td colspan="5">Tindakan tatatertib:</td>

                <td>Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->tatatertib == 1){{ '/' }}@endif</span></td>
                <td colspan="2">Tidak Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->tatatertib == 0){{ '/' }}@endif</span></td>

            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr class="normal-size">
                <td></td>
                <td>b)</td>
                <td colspan="10">Telah mengisytiharkan harta mengikut peraturan yang ditetapkan.</td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr class="normal-size">
                <td></td>
                <td>c)</td>
                <td colspan="5">Lanjutan tempoh percubaan dengan denda :</td>

                <td>Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->tempoh_percubaan_denda == 1){{ '/' }}@endif</span></td>
                <td colspan="2">Tidak Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->tempoh_percubaan_denda == 0){{ '/' }}@endif</span></td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr class="normal-size">
                <td></td>
                <td>d)</td>
                <td colspan="5">Cuti Tanpa Gaji selain Cuti Belajar Tanpa Gaji</td>

                <td>Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->cuti_tanpa_gaji == 1){{ '/' }}@endif</span></td>
                <td colspan="2">Tidak Pernah</td>
                <td><span class="box-small">@if($akuan_pegawai->cuti_tanpa_gaji == 0){{ '/' }}@endif</span></td>
            </tr>
            <tr>

                <td colspan="12" style="height: 10px"></td>

            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    Saya mengaku bahawa butiran yang dinyatakan di dalam Borang JKR/UKP/12 ini adalah benar. Sekiranya tidak benar, saya boleh dikenakan tindakan tatatertib di bawah Peraturan 4 (f) dan Peraturan 4 (g), Peraturan-Peraturan Pegawai Awam ( Kelakuan dan Tatatertib ) 1993.
                </td>
            </tr>
            <tr>

                <td colspan="12" style="height: 50px"></td>

            </tr>
            <tr class="normal-size">
                <td></td>
                <td colspan="3">Tandatangan Pegawai :</td>

                <td colspan="8"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Nama</td>

                <td style="text-align: center;">:</td>
                <td colspan="8">{{ strtoupper(htmlspecialchars_decode($peribadi->nama)) }}</td>

            </tr>
            <tr>
                <td></td>
                <td colspan="2">Jawatan</td>

                <td style="text-align: center;">:</td>
                <td colspan="8">{{ $pemohon->jawatan }} {{ $pemohon->gred }}</td>

            </tr>
            <tr>
                <td></td>

                <td colspan="2">Alamat Pejabat</td>

                <td style="text-align: center;">:</td>
                <td colspan="8">{{ strtoupper($peribadi->alamat_pejabat) }}</td>

            </tr>
            <tr>
                <td></td>
                <td colspan="2">Tarikh</td>

                <td style="text-align: center;">:</td>
                <td colspan="8">{{ \Carbon\Carbon::parse($akuan_pegawai->perakuan_tkh)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td colspan="12" style="height: 30px"></td>
            </tr>
            <tr style="font-weight: bold;" class="normal-size">
                <td>VI.</td>
                <td colspan="11">PERAKUAN KETUA JABATAN</td>

            </tr>
            <tr>
                <td colspan="12" style="height: 10px"></td>
            </tr>
            <tr style="" class="normal-size top-border">
                <td colspan="12" style="height: 20px" class=""></td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td></td>
                <td colspan="3">Perakuan Ketua Jabatan :</td>
                <td colspan="2">Diperaku</td>
                <td><span class="box-small">{{ empty($pemohon->perakuan_ketua_jabatan) ? '' : ($pemohon->perakuan_ketua_jabatan == 1 ? '/' : '') }}</span></td>
                <td colspan="2">Tidak Diperakui</td>
                <td><span class="box-small">{{ empty($pemohon->perakuan_ketua_jabatan) ? '' : ($pemohon->perakuan_ketua_jabatan != 1 ? '/' : '') }}</span></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td colspan="12" style="height: 20px" class=""></td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td></td>
                <td colspan="3">Ulasan Ketua Jabatan :</td>
                <td colspan="8"></td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td colspan="12" style="height: 20px" class=""></td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td></td>
                <td colspan="11">
                    <span style="text-decoration: underline;">{{ $pemohon->perakuan_ketua_jabatan_ulasan ?? '' }}</span>
                </td>
            </tr>
            <tr style="" class="normal-size side-border">
                <td colspan="12" style="height: 30px" class=""></td>
            </tr>
            <tr class="side-border">
                <td colspan="2"></td>
                <td style="normal-size">
                    <span>Nama</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="8">{{ $pemohon->perakuan_ketua_jabatan_nama ? strtoupper(htmlspecialchars_decode($pemohon->perakuan_ketua_jabatan_nama)) : ''}}</td>
            </tr>

            <tr class="side-border">
                <td colspan="2"></td>
                <td style="normal-size">
                    <span>Jawatan</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="8">{{ $pemohon->perakuan_ketua_jabatan_jawatan ?? ''}}</td>
            </tr>

            <tr class="side-border">
                <td colspan="2"></td>
                <td style="normal-size">
                    <span>Caw./Jabatan</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="8">{{ strtoupper($pemohon->perakuan_ketua_jabatan_alamat_pejabat ?? '') }}</td>
            </tr>

            <tr class="side-border">
                <td colspan="2"></td>
                <td style="normal-size">
                    <span>Tarikh</span>
                </td>
                <td style="normal-size" style="text-align: center;">
                    <span>:</span>
                </td>
                <td colspan="8">{{ empty($pemohon->perakuan_ketua_jabatan_tkh) ? '' : \Carbon\Carbon::parse($pemohon->perakuan_ketua_jabatan_tkh)->format('d-m-Y')}}</td>
            </tr>
            <tr style="" class="normal-size bottom-border">
                <td colspan="6" style="height: 20px" class=""></td>
                <td colspan="6" style="height: 20px" class=""></td>
            </tr>
        </tbody>
    </table>

  </body>
</html>
