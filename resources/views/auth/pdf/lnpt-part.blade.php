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
                    <span class="normal-size ow" style="">{{ $pemohon->alamat_pejabat }}</span>
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
                        @php
                        $year = \Carbon\Carbon::parse(Date::now())->format('Y');
                        @endphp
                        <tbody>
                            <tr style="text-align: center;">
                                <td>Tahun</td>
                                <td>{{ $year-1 }}</td>
                                <td>{{ $year-2 }}</td>
                                <td>{{ $year-3 }}</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>Markah</td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                    <span class="normal-size box-small"></span>

                </td>
                <td colspan="2">
                    <span class="normal-size" style="padding-right: 5px;">Tiada</span>
                    <span class="normal-size box-small">
                    </span>
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
  </body>
  </html>
