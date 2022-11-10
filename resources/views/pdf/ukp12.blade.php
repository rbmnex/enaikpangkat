<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}">
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
                    <img src="{{ asset('images/jkr_logo.png') }}" width="70" height="50">
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
                <td colspan="8"></td>

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
                    <span class="normal-size"><strong>J48</strong></span>
                </td>

            </tr>
            <tr>
                <td colspan="4"><span class="normal-size"><strong>JAWATAN</strong></span></td>
                <td colspan="8">
                    <span class="normal-size"><strong>: </strong></span>
                    <span class="normal-size"><strong>JURUTERA AWAN</strong></span>
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
                    <span class="normal-size">MUHAMMAD BRUNSON BIN ARMY</span>
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
                    <span class="normal-size">TIDAK BERKENAAN</span>
                </td>
                <td colspan="6">
                    <span class="normal-size"> (Baru) </span>
                    <span class="normal-size">830801025623</span>
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
                    <span class="normal-size">JURUTERA AWAM J44</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh lantikan perkhidmatan (semasa J41)</span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">10-10-1998</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh * disahkan jawatan / naik pangkat terkini </span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">10-10-2010</span>
                </td>
            </tr>
            <tr style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; line-height: 15px;">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Umur persaraan wajib</span>
                </td>

                <td colspan="8">
                    <span class="normal-size"> : </span>
                    <span class="normal-size">58</span>
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
                    <span class="normal-size box-small">/</span>

                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Tiada</span>
                    <span class="normal-size box-small">/</span>
                </td>
                <td colspan="8"></td>
            </tr>
            <tr class="side-border" style="height: 20px;">
                <td colspan="12"></td>
            </tr>
            <tr class="side-border">
                <td ></td>
                <td colspan="8">
                    <table border="1">
                        <thead style="font-size: 14px; text-align: center;">
                            <th>Cuti</th>
                            <th>Tarikh Mula</th>
                            <th>Tarikh Tamat</th>
                        </thead>
                        <tbody class="word-line">
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
                        </tbody>
                    </table>
                </td>
                <td colspan="3"></td>
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
                <td colspan="12">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px;">Saya telah menyemak butir-butir perkhidmatan pegawai di atas dan disahkan betul</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 100px;"></td>
            </tr>

            <tr class="side-border">
                <td colspan="2"></td>
                <td colspan="8" style="text-align: center">
                    .....................................................................
                </td>
                <td colspan="2"></td>
            </tr>
            <tr class="side-border">
                <td colspan="2"></td>
                <td colspan="8" style="text-align: center;"><span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">Tandatangan dan Cop Kerani Perkhidmatan</span></td>
                <td colspan="2"></td>
            </tr>

            <tr class="bottom-border">
                <td colspan="12" style="height: 10px;"></td>
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
                    <span class="normal-size ow" style="">CAWANGAN KERJA BANGUNAN AM 1
                    IBU PEJABAT JKR MALAYSIA
                    TINGKAT 13,13A & 17, MENARA PJD
                    NO.50, JALAN TUN RAZAK
                    50400 KUALA LUMPUR</span>
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
                    <span class="normal-size" style="">03-26107071</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">No. Faksimili : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">03-26107075</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">No. Telefon (Bimbit) : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">016-7908584</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px; ">E-mel : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">brunson@jkr.gov.my</span>
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
                    <span class="normal-size" style="">15-10-2021</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 20px;"> </td>
            </tr>

            <tr class="side-border">
                <td colspan="12" class="word-line">
                    <span class="normal-size" style="font-style: italic; padding-left: 5px; font-weight: bold;">* Kelulusan Pengisytiharan Harta (LAMPIRAN E yang dijana dari HRMIS) yang disahkan perlu disertakan bersama</span>
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
                        <tbody>
                            <tr style="text-align: center;">
                                <td>Tahun</td>
                                <td>2021</td>
                                <td>2020</td>
                                <td>2019</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>Markah</td>
                                <td>98.9</td>
                                <td>98.1</td>
                                <td>97.5</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="12" style="height: 10px;"> </td>
            </tr>
            <tr class="side-border">
                <td colspan="12">
                    <span class="normal-size" style="padding-left: 5px; font-weight: bold; font-style: italic;">* Pegawai KADER perlu memajukan salinan LNPT yang telah disahkan oleh pejabat</span>
                </td>
            </tr>
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
                    <span class="normal-size box-small">/</span>

                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Tiada</span>
                    <span class="normal-size box-small">/</span>
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
                    <span class="normal-size" style="">Tiada</span>
                </td>
            </tr>
            <tr class="side-border">
                <td colspan="4">
                    <span class="normal-size" style="padding-left: 5px;">Tarikh Hukuman : </span>
                </td>
                <td colspan="8">
                    <span class="normal-size" style="">Tiada</span>
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
            <tr>
                <td></td>
                <td colspan="11">
                    <span class="normal-size" style="font-weight: bold;">PERINGATAN : </span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="11">
                    <span class="normal-size">Semua ruangan hendaklah dipenuhkan. Jika tidak berkenaan tulis </span> <span class="normal-size" style="font-weight: bold;">“TIDAK BERKENAAN”</span><span class="normal-size">, tiada, tulis </span><span class="normal-size" style="font-weight: bold;">“TIADA”</span><span class="normal-size">.</span>
                </td>
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
                                <td colspan="8">TUAN</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td colspan="2">
                                    NAMA
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">MUHAMMAD BRUNSON BIN ARMY</td>
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
                                <td style="text-align: center;">830801025623</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">TIADA<</td>
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
                                <td>LELAKI</td>
                                <td></td>
                                <td></td>
                                <td colspan="2">BANGSA</td>
                                <td style="text-align: center;">:</td>
                                <td>IBAN</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td colspan="2">AGAMA</td>

                                <td style="text-align: center;">:</td>
                                <td>ISLAM</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td colspan="4">TARIKH/TEMPAT LAHIR</td>

                                <td style="text-align: center;">:</td>
                                <td colspan="4">12-01-1979 / SABAH</td>

                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td colspan="4">JAWATAN PEKERJAAN</td>

                                <td style="text-align: center;">:</td>
                                <td colspan="4">JURUTERA AWAM J44</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="5">(Contoh: Jurutera Awam J52)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td colspan="2">
                                    GAJI HAKIKI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="8">RM 4789.90</td>
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
                                <td colspan="6">CAWANGAN KERJA BANGUNAN AM 1
                                    IBU PEJABAT JKR MALAYSIA
                                    TINGKAT 13,13A & 17, MENARA PJD
                                    NO.50, JALAN TUN RAZAK
                                    50400 KUALA LUMPUR</td>

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
                                <td colspan="6">no.77 Jalan tps 2/13,
                                    taman pelangi semenyih 2,
                                    43500 semenyih
                                    kajang selangor</td>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>11.</td>
                                <td colspan="4">
                                    NAMA SUAMI/ISTERI
                                </td>
                                <td style="text-align: center;">:</td>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">NUR NADIAH BT MOHAMAD</td>

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
                                <td colspan="6">JURURAWAT</td>

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
                                <td colspan="6">Klinik Kesihatan Batu 9 Cheras,
                                    Jalan Hulu Langat, Cheras,
                                    43200 Cheras, Selangor</td>

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
                                <td>15.</td>
                                <td colspan="11">JAWATAN/PENEMPATAN SEPANJANG PERKHIDMATAN </td>

                            </tr>
                            <tr>
                                <td colspan="12"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1" style="table-layout:fixed">
                                        <thead>
                                            <th style="text-align: center; width: 25%;">BIL.</th>
                                            <th style="text-align: center;">GELARAN JAWATAN</th>
                                            <th style="text-align: center;">PENEMPATAN</th>
                                            <th style="text-align: center; width: 60%">TAHUN BERKHIDMAT</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="height: 30px; width: 25%;"></td>
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
                                            <tr>
                                                <td style="height: 30px ; width: 25%;"></td>
                                                <td></td>
                                                <td></td>
                                                <td style="width: 60%"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <td style="height: 50px" colspan="12"></td>
                            </tr>

                            <tr>
                                <td>16.</td>
                                <td colspan="11">JAWATAN YANG DIPEGANG DALAM PERTUBUHAN/LAIN-LAIN </td>

                            </tr>
                            <tr>
                                <td colspan="12"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1">
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
                                    </table>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="12" style="height: 50px"></td>

                            </tr>
                            <tr>
                                <td>17.</td>
                                <td colspan="11">JAWATAN YANG DIPEGANG DALAM PERTUBUHAN/LAIN-LAIN </td>

                            </tr>
                            <tr>
                                <td colspan="12"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="11">
                                    <table border="1" style="table-layout: fixed">
                                        <tr>
                                            <th style="text-align: center;" class="width-25">BIL.</th>
                                            <th style="text-align: center;">KELULUSAN
                                                <span style="font-style: italic;">(Cth: B.Eng(Hons)Civil Eng.)
                                                MSc. (Project Management)</span></th>
                                            <th style="text-align: center; width: 75%">INSTITUT PUSAT PENGAJIAN TINGGI</th>
                                            <th style="text-align: center; width: 50%">TAHUN</th>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                <td style="height: 30px;" class="width-25"></td>
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
                                        </tbody>
                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
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
        </tbody>
    </table>
    </div>
  </body>
</html>
