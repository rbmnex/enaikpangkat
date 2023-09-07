<meta charset="utf-8">
<html>
<head>
    <title>Resume</title>
    <style>
        .grey{
            background-color: #D1D0CE;
            height: 30px;
            }

            .grey1{
            background-color: #D1D0CE;
            }

        .outerline {
                    border: 1px solid black;
        			border-collapse: collapse;
                    width: 100%;
                    font-family:Tahoma, sans-serif;
                    font-size: 11px;
        }

        .noline {
            font-family:Tahoma, sans-serif;
            font-size: 11px;
        }

        .smallbox {
            font-family:Tahoma, sans-serif;
            font-size: 11px;
            width: 100%;

        }

        .mainbox {
            border-collapse: collapse;
            border-left: 0px;
            border-right: 0px;

        }

        .boxpengalaman{
            border-top: 1px solid black;
            border-right: 1px solid black;
            border-collapse: collapse;
            font-family:Tahoma, sans-serif;
            font-size: 11px;
            border-left: 0px;

        }

        .boxpengalaman3{
            border-top: 1px solid black;
            border-left: 1px solid black;
            border-collapse: collapse;
            font-family:Tahoma, sans-serif;
            font-size: 11px;
            border-right: 0px;

        }

        .kini{
        font-family:Tahoma, sans-serif;
            font-size: 11px;

        }

        .boxpengalaman2{
           font-family:Tahoma, Geneva, Verdana, sans-serif;
           font-size: 11px;
           border-left: 0px;

        }


        .font{
            font-family:Arial, Helvetica, sans-serif;
            font-size: 12pt;

        }


        .bordertop{
            border-top: 1px solid black;
            border-right: 1px solid black;

        }


        .righttop{
            border-top: 1px solid black;
        }


        .photo{
            margin-top: 10px;
            margin-right: 0px;
        /*	text-align:right;*/
        }

        /*.no {
          vertical-align:top}
        */
        /*.page-break {
            page-break-after: always!important;
        }

        @media print {

        .page-break {
            page-break-after: always!important;
        }
        }*/
            .small-width {
                width: 5%;
            }
        </style>
</head>
<body bgcolor="white">
    <div id="profile" style="page-break-after: always">
        <table class="outerline">
            <tr >
                <th class="grey" colspan="7" >RESUME</th>
             </tr>
             <tr>
                <td colspan="7"><b>A.BUTIRAN PERIBADI</b></td>
             </tr>
             <tr>
                <td colspan="7">
                   <table class="noline">
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>NAMA</td>
                         <td>:</td>
                         <td>{{$model['gelaran']}} {{ strtoupper($model['name']) }}</td>
                         <td rowspan="7" class="photo">
                            <img src="{{ asset('files/foto-'.$model['nokp'].'.jpg') }}"
                               alt="" width="120" height="140" align="top">
                         </td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>JAWATAN</td>
                         <td>:</td>
                          <td>{{$model['gelaran_jawatan'] ?? '' }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>KAD PENGENALAN</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['nokp']) }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>TARIKH LAHIR</td>
                         <td>:</td>
                         <td>{{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>TEMPAT LAHIR</td>
                         <td>:</td>
                         <td> {{ strtoupper($model['peribadi']['tempat_lahir']) }} </td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>ALAMAT PEJABAT</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['alamat_pejabat']) }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>ALAMAT RUMAH</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['peribadi']['alamat_rumah']) }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>TARAF PERKAHWINAN</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['peribadi']['taraf_perkahwinan']) }} </td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>NO. TELEFON PEJABAT</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['tel_pejabat']) }}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>NO. TELEFON BIMBIT</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['peribadi']['tel_bimbit'])}}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>NO. FAX</td>
                         <td>:</td>
                         <td>{{ strtoupper($model['peribadi']['no_fax'] )}}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>EMEL</td>
                         <td>:</td>
                         <td>{{ $model['email']}}</td>
                      </tr>
                      <tr>
                         <td><span>&#8226;</span></td>
                         <td>TARIKH PENGISYTIHARAN HARTA TERKINI</td>
                         <td>:</td>
                         <td> {{isset($model['isytiharHarta']['tkh_mula_peristiwa']) ? date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) : ""  }}</td>
                      </tr>
                   </table>
                </td>
             </tr>
             <tr >
                 <td style="vertical-align:top;" colspan="2" class="bordertop"><b>B. PRESTASI</b><br>(LNPT 3 tahun terkini)</td>
                 <td colspan="5" class="righttop">
                    @role(['superadmin','adminjusa','secretariat'])
                   <ul>
                      @if(isset($model['markah']))
                      @foreach($model['markah'] as $markah)
                      <li>{{ $markah['tahun'] }} - {{ $markah['purata'] }} % </li>
                      @endforeach
                      @endif
                   </ul>
                   @endrole
                </td>
             </tr>
             <tr>
                <td style="vertical-align:top;"colspan="2"  class="bordertop">
                   <b>C. KEPAKARAN DAN PENGALAMAN</b><br>
                   <ul>
                      <li>Tempoh bidang pengkhususan</li>
                      <li>Tempoh atas gred terakhir</li>
                      <li>Tempoh perkhidmatan</li>
                   </ul>
                </td>
                <td colspan="5" class="righttop">
                   <b>Pengkhususan</b>
                   <ul>
                   @if(empty($model['pengalamanPengkhususan']['khusus']))
                    <li>
                        tiada
                    </li>
                   @else

                   @foreach($model['pengalamanPengkhususan']['khusus'] as $val)
                    <li>
                        {{ $val['jumlah_pengalaman']}}
                    </li>
                    @endforeach

                   @endif
                        <li>Tempoh Perkhidmatan di Gred Terkini selama {{$tempoh_gred->y}} tahun</li>
                        <li>Tempoh Perkhidmatan Sektor Awam selama {{$tempoh_awam->y}} tahun</li>
                        <!-- <li>Tempoh Perkhidmatan di Gred P&P selama {{$tempoh_pnp->y}} tahun</li> -->
                    </ul>
                   {{-- <br><br> --}}
                   {{-- <ul>

                   </ul> --}}
                </td>
             </tr>
             <tr>
                <td style="vertical-align:top;"colspan="2"  class="bordertop">
                   <b>D. PENDEDAHAN</b><br><br>
                   <table class="smallbox" >
                      <tr><td>Majikan :</td></tr>
                      <tr><td>JABATAN KERJA RAYA MALAYSIA</td></tr>
                      <tr><td>Skim Perkhidmatan  :</td></tr>
                      <tr><td>PENGURUSAN DAN PROFESIONAL</td></tr>
                      <tr><td>Tarikh Mula Perkhidmatan    :</td></tr>
                      <tr><td>{{ isset($mula_khidmat->tkh_lantik) ? date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) : ''}}</td></tr>
                      <tr><td>Tarikh Bersara Wajib  :</td></tr>
                      <tr><td>{{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</td></tr>
                      @if(!empty($gred_sekarang->status_perkhidmatan))
                      @if($gred_sekarang->status_perkhidmatan == 'H')
                      <tr><td>Gred Hakiki     :</td></tr>
                      <tr><td> {{$model['perkhidmatan']['gred_sekarang']}}</td></tr>
                      <tr><td>Tarikh Mula Gred Hakiki    : </td></tr>
                      <tr><td>{{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</td></tr>
                      @elseif ($gred_sekarang->status_perkhidmatan == 'M')
                      <tr><td>Gred Memangku :<td></tr>
                      <tr><td>{{$model['perkhidmatan']['gred_sekarang']}}</td></tr>
                      <tr><td>Tarikh Mula Gred Memangku : </td></tr>
                      <tr><td>{{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</td></tr>
                      @endif
                      @endif
                   </table>
                </td>
                <td style="vertical-align:top;" colspan="5" class="righttop">
                   <b>Pengalaman Kerja</b>
                   <table class="mainbox" style="width: 100%;">
                      <tr class="">
                         <th class="boxpengalaman" >Kategori</th>
                         <th class="boxpengalaman">Penempatan</th>
                         <th class="boxpengalaman">Gred Jawatan</th>
                         <th class="boxpengalaman">Gelaran Jawatan</th>
                         <th class="boxpengalaman3" style="width: 15%">Tempoh Khidmat</th>
                      </tr>
                      @if(isset($model['pengalaman']))
                      @foreach($model['pengalaman'] as $pengalaman)
                      <tr>
                         <td class="boxpengalaman" >{{ strtoupper($pengalaman['aktiviti']) }}</td>
                         <td class="boxpengalaman">{{ strtoupper($pengalaman['tempat']) }}</td>
                         <td class="boxpengalaman"><center>{{ strtoupper($pengalaman['kod_gred_sebenar']) }}</center></td>
                         <td class="boxpengalaman">{{ $pengalaman['kod_gelaran_jawatan']}}</td>
                         <td class="boxpengalaman3" style="width: 15%">
                            <table class="kini" style="width: 100%;">
                               <tr>
                                    <td class="boxpengalaman2">
                                        {{date('d-m-Y', strtotime($pengalaman['mula']))  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="boxpengalaman2">sehingga</td>
                                </tr>
                                @if (date('d-m-Y', strtotime($pengalaman['tamat'] )) == '01-01-0001')
                                <tr>
                                    <td class="boxpengalaman2">kini</td>
                                </tr>
                                @else
                                  <tr>
                                    <td class="boxpengalaman2">{{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }}</td>
                                </tr>
                                @endif
                            </table>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                   </table>
                </td>
             </tr>
             <tr>
                <td style="vertical-align:top;" colspan="2" rowspan={{$kira_kelayakan }} class="bordertop">
                   <p><b>E. KELAYAKAN AKADEMIK DAN PROFESIONAL</b></p>
                   <p><b>KELAYAKAN KOMPETENSI TEMPATAN/</b></p>
                   <p><b>KELAYAKAN KOMPETENSI ANTARABANGSA</b></p>
                </td>
                <td  colspan="5" class="righttop" style="border-spacing:0px;  background-color: #D1D0CE;"></td>
             </tr>
             <tr class="grey1">
                <td class="grey1" colspan="5">
                   <center><b>KELAYAKAN AKADEMIK</b></center>
                </td>
             </tr>
             <tr>
                <th  class="boxpengalaman">No</th>
                <th class="boxpengalaman" colspan="2">Tajuk <br/> Kelulusan</th>
                <th class="boxpengalaman">Institusi Pengajian</th>
                <th class="boxpengalaman" style="width: 10%">
                   <center>Tahun Kelulusan</center>
                </th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['kelayakan']))
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="2"></td>
                <td class="boxpengalaman"></td>
                <td class="boxpengalaman" style="width: 10%">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['kelayakan'] as $kelayakan)
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="2">{{ strtoupper(htmlspecialchars_decode($kelayakan['nama_kelulusan'])) }}</td>
                <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($kelayakan['institusi'])) }}</td>
                <td class="boxpengalaman" style="width: 10%">
                   <center>{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif

             <tr class="grey1">
                <td colspan="5">
                   <center><b>PROFESIONAL</b></center>
                </td>
             </tr>
             <tr>
                <th class="boxpengalaman">No</th>
                <th class="boxpengalaman" colspan="2">Badan Profesional yang diiktiaf dan Kelayakan</th>
                <th class="boxpengalaman" colspan="2">No pendaftaran</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['professional']))
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                  <center>{{ $i + 1 }}</center>
               </td>
               <td class="boxpengalaman" colspan="2"></td>
               <td class="boxpengalaman" colspan="2"><center></center></td>

            </tr>
             @else
             @foreach($model['professional'] as $professional)
             <tr>
                 <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="2">{{ strtoupper(htmlspecialchars_decode($professional['nama_kelulusan'])) }}</td>
                <td class="boxpengalaman" colspan="2"><center>{{strtoupper($professional['no_daftar'])}}</center></td>
                <!-- <td class="boxpengalaman">
                   <center>{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</center>
                </td> -->
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>KELAYAKAN KOMPETENSI TEMPATAN</b></center>
                </td>
             </tr>
             <tr>
                <th class="boxpengalaman">No</th>
                <th class="boxpengalaman">Pensijilan Kompetensi</th>
                <th class="boxpengalaman">Tahap</th>
                <th class="boxpengalaman">No pendaftaran</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['tempatan']))
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                     <center>{{ $i + 1 }}</center>
                  </td>

                  <td class="boxpengalaman"></td>

                  <td class="boxpengalaman"></td>
                  <td class="boxpengalaman"></td>
                  <td class="boxpengalaman">
                     <center></center>
                  </td>
               </tr>
             @else
             @foreach($model['tempatan'] as $tempatan)
             <tr>
              <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                @if($tempatan['nama_kelulusan'] != 9999)
                <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($tempatan['nama_kelulusan'])) }}</td>
                @else
                <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($tempatan['institusi']))}}</td>
                @endif
                <td class="boxpengalaman"><center>{{ strtoupper($tempatan['tahap']??'') }}</center></td>
                <td class="boxpengalaman">{{strtoupper($tempatan['no_daftar'])}}</td>
                <td class="boxpengalaman">
                   <center>{{ date('Y', strtotime($tempatan['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>KELAYAKAN KOMPETENSI ANTARABANGSA</b></center>
                </td>
             </tr>
             <tr>
                <th class="boxpengalaman">No</th>
                <th class="boxpengalaman">Pensijilan Kompetensi</th>
                <th class="boxpengalaman">Tahap</th>
                <th class="boxpengalaman">No pendaftaran</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['antarabangsa']))
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>

                <td class="boxpengalaman"></td>

                <td class="boxpengalaman"></td>
                <td class="boxpengalaman"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['antarabangsa'] as $antarabangsa)
             <tr>
                <td style="vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                @if($antarabangsa['nama_kelulusan'] != 9999)
                <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($antarabangsa['nama_kelulusan'])) }}</td>
                @else
                <td class="boxpengalaman">{{ strtoupper(htmlspecialchars_decode($antarabangsa['institusi']))}}</td>
                @endif
                <td class="boxpengalaman">{{ strtoupper($antarabangsa['tahap']??'') }}</td>
                <td class="boxpengalaman">{{strtoupper($antarabangsa['no_daftar'])}}</td>
                <td class="boxpengalaman">
                   <center>{{ date('Y', strtotime($antarabangsa['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr>
                <td style="vertical-align:top;" colspan="2" class="bordertop" rowspan={{$kira_sumbangan}} ><b>F. SUMBANGAN DAN KEGIATAN</b></td>
                <td colspan="5" class="righttop" style=" background-color: #D1D0CE;"></td>
             </tr>
             <tr class="grey1">
                <td colspan="5" class="grey1">
                   <center><b>JURNAL/BULETIN/KERTAS UTAMA</center>
                   </b>
                </td>
             </tr>
             <tr>
                 <th style="width: 6px;" class="boxpengalaman" >No</th>
                 <th class="boxpengalaman" colspan="3">Tajuk</th>
                 <th style="width: 90px;" class="boxpengalaman" >Tahun</th>
            </tr>
            <?php $i=0; ?>
            @if(empty($model['jurnal']))
            <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman" >
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3"></td>
                <td style="width: 90px;"class="boxpengalaman" >
                   <center></center>
                </td>
             </tr>
            @else
             @foreach($model['jurnal'] as $jurnal)
             <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman" >
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($jurnal['nama_kelulusan'])) }}</td>
                <td style="width: 90px;"class="boxpengalaman" >
                   <center>{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5" >
                   <center><b>JAWATAN KUASA TEKNIKAL</center>
                   </b>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;" class="boxpengalaman">No</th>
                <th class="boxpengalaman"colspan="3">Jawatankuasa Teknikal</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['jawatanKuasateknikal']))
             <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
             <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($jawatanKuasateknikal['nama_kelulusan'])) }}</td>
                <td class="boxpengalaman">
                   <center>{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>SUMBANGAN DAN KEGIATAN DI DALAM TUGAS RASMI</center>
                   </b>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;" class="boxpengalaman">No</th>
                <th class="boxpengalaman" colspan="3">Sumbangan</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(@empty($model['dalamTugasrasmi']))
             <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3"></td>
                <td class="boxpengalaman" >
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
             <tr>
                <td style="width: 6px;vertical-align:top;" class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3">{{ strtoupper(htmlspecialchars_decode($dalamTugasrasmi['nama_kelulusan'])) }}</td>
                <td class="boxpengalaman" >
                   <center>{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>SUMBANGAN DAN KEGIATAN DI LUAR TUGAS RASMI</center>
                   </b>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;"class="boxpengalaman">No</th>
                <th class="boxpengalaman"colspan="3">Sumbangan</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['luarTugasrasmi']))
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($luarTugasrasmi['nama_kelulusan'])) }}</td>
                <td class="boxpengalaman">
                   <center>{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             </td>
             </tr>
             <tr>
                <td style="vertical-align:top;"colspan="2" class="bordertop" rowspan={{$kira_iktiraf}}><b>G. PENGIKTIRAFAN</b></td>
                <td colspan="5" class="righttop" style=" background-color: #D1D0CE;">
                </td>
             </tr>
             <tr class="grey1" >
                <td colspan="5">
                   <center><b>APC</b></center>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;"class="boxpengalaman"> No</th>
                <th class="boxpengalaman" colspan="3">APC</th>
                <th class="boxpengalaman" >Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['aPC']))
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['aPC'] as $aPC)
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($aPC['kod_peristiwa'])) }}</td>
                <td class="boxpengalaman">
                   <center>{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>PINGAT</center>
                   </b>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;"class="boxpengalaman">No</th>
                <th class="boxpengalaman" colspan="3">Pingat</th>
                <th class="boxpengalaman" >Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['pingat']))
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['pingat'] as $pingat)
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman"colspan="3">{{ strtoupper(htmlspecialchars_decode($pingat['kod_peristiwa'])) }} ({{ strtoupper(htmlspecialchars_decode($pingat['catatan'])) }})</td>
                <td class="boxpengalaman">
                   <center>{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             <tr class="grey1">
                <td colspan="5">
                   <center><b>ANUGERAH UMUM</center>
                   </b>
                </td>
             </tr>
             <tr>
                <th style="width: 6px;"class="boxpengalaman">No</th>
                <th class="boxpengalaman" colspan="3">Anugerah Umum</th>
                <th class="boxpengalaman">Tahun</th>
             </tr>
             <?php $i=0; ?>
             @if(empty($model['anugerahUmum']))
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3"></td>
                <td class="boxpengalaman">
                   <center></center>
                </td>
             </tr>
             @else
             @foreach($model['anugerahUmum'] as $anugerahUmum)
             <tr>
                <td style="width: 6px;vertical-align:top;"class="boxpengalaman">
                   <center>{{ $i + 1 }}</center>
                </td>
                <td class="boxpengalaman" colspan="3">{{ isset($anugerahUmum['catatan']) ? strtoupper(htmlspecialchars_decode($anugerahUmum['catatan'])) : '' }}</td>
                <td class="boxpengalaman">
                   <center>{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</center>
                </td>
             </tr>
             <?php $i++; ?>
             @endforeach
             @endif
             {{-- <tr></tr>
             <tr></tr> --}}
             <tr>
                <td style="vertical-align:top;"colspan="2"  class="bordertop">
                   <b>H. LAMPIRAN</b><br>

                </td>
                <td colspan="5" class="righttop" style="padding-top: 12px;">
                    {{-- <br> --}}
                    <ul>
                       <li>LAMPIRAN 1 - KURSUS DAN SEMINAR YANG DIHADIRI</li>
                       <li>LAMPIRAN 2 - LAMPIRAN DESKRIPSI TUGAS (JD)</li>
                       <li>LAMPIRAN 3 - SENARAI PROJEK BESERTA KOS (DI PENEMPATAN SEMASA SAHAJA)</li>
                       {{-- <li>LAMPIRAN 4 - SENARAI KEPAKARAN</li>
                       <li>LAMPIRAN 5 - SENARAI PENCAPAIAN TERTINGGI</li> --}}
                    </ul>
                </td>
             </tr>
        </table>
    </div>

    <pre><br clear=all style='mso-special-character:line-break;page-break-before:always'></pre>

    <p style="page-break-after: always;">&nbsp;</p>
    @php
    $user = Auth::user();
    $allow = false;
    if(\Laratrust::hasRole('user')) {
        if(\Laratrust::hasRole('admindisiplin')) {
            if($user->nokp == $model['nokp']) {
                $allow = true;
            } else {
                $allow = false;
            }
        } else if(\Laratrust::hasRole(['superadmin','adminjusa','secretariat'])) {
            $allow = true;
        } else {
            $allow = false;
        }
    } else {
        $allow = false;
    }

  @endphp
  @if($allow)
    <div style="" class="font">
        <table class="font" style="width:100%;">
           <tr>
              <td colspan="7" style="text-align:right;">
                 <b>LAMPIRAN 1</b>
                 <br/>
                 <br/>
              </td>
           </tr>
           <tr>
              <td colspan="7">
                 <b>KURSUS DAN SEMINAR YANG DIHADIRI</b>
                 <br/>
                 <br/>
              </td>
           </tr>
              <?php $i=0; ?>
              @if(isset($lampiran_kursus))
              @foreach($lampiran_kursus as $lk)
           <tr style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt">
              <td style="width: 5%;vertical-align:top;">{{ $i + 1 }}.</td>
              <td colspan="6">{{htmlspecialchars_decode($lk->nama_kursus)  }}.
                <br/>({{date('d-m-Y', strtotime($lk->tkh_mula))}} - {{date('d-m-Y', strtotime($lk->tkh_tamat))}}) , {{$lk->tempat}}
                <br/>
            </td>
           </tr>
           <?php $i++; ?>
           @endforeach
           @else
           <tr>
              <td style="width: 5%;vertical-align:top;"></td>
              <td colspan="6"></td>
           </tr>
           @endif
           <tr>
              <td style="width: 5%;vertical-align:top;"></td>
              <td colspan="6"></td>
           </tr>
        </table>
        <br>
     </div>

     <pre><br clear=all style='mso-special-character:line-break;page-break-before:always'></pre>
     <p style="page-break-after: always;">&nbsp;</p>

     <div style="" class="lampiran3">
        <table class="font" style="width: 100%;">
           <tr>
              <td colspan="7" style="text-align:right;">
                 <b>LAMPIRAN 2</b>
                 <br/>
                 <br/>
              </td>
           </tr>
           <tr>
              <td colspan="7" style="text-align:left;">
                          <p>-RUJUK LAMPIRAN JD- </p>
              </td>
           </tr>
           <?php
              // A few settings
              // $image =url('/').$lampiran_beban->path;

              // // Read image path, convert to base65 encoding
              // $imageData = base64_encode(file_get_contents($image));

              // // Format the image SRC:  data:{mime};base64,{data};
              // $src = 'data:'.mime_content_type($image).';base64,'.$imageData;

              // // Echo out a sample image
              // echo '<img src="',$src,'">';
              ?>
           <tr>
              <td colspan="7" style="text-align:right;">	</td>
           </tr>
        </table>
        <br>
     </div>

     <pre><br clear=all style='mso-special-character:line-break;page-break-before:always'></pre>
     <p style="page-break-after: always;">&nbsp;</p>

     <div style="" class="lampiran4">
        <table class="font" style="width:100%;">
           <tr>
              <td colspan="7" style="text-align:right; ">
                 <b>LAMPIRAN 3</b>
                 <br/>
                 <br/>
              </td>
           </tr>
           <tr>
              <td colspan="7">
                 <b>SENARAI PROJEK BESERTA KOS(DI PENEMPATAN SEMASA SAHAJA)</b>
                 <br/>
                 <br/>
              </td>
           </tr>
           <?php $i=0; ?>
              @if(isset($lampiran_projek))
              @foreach($lampiran_projek as $lp)
           <tr>

              <td style="width: 5%;vertical-align:top;">{{ $i + 1 }}.</td>
              <td colspan="6">{{htmlspecialchars_decode($lp->nama_projek)}}.<br>Kos Projek: RM{{number_format($lp->kos_projek,2)}}</td>
           </tr>
           <tr></tr>
           <?php $i++; ?>
           @endforeach
           {{-- <tr>
              <td>@.</td>
              <td colspan="6">!@#$%^&*()_+ +_)(*&^%$#@!)</td>
           </tr> --}}
           {{-- <tr>
              <td colspan="7" style="text-align:right; width:800px; height: 800px;">	</td>
           </tr> --}}
           <tr>
              <td style="width: 5%;vertical-align:top;"></td>
              <td colspan="6"></td>
           </tr>
           @endif
        </table>
         <br>
  </div>

  <pre><br clear=all style='mso-special-character:line-break;page-break-before:always'></pre>
  <p style="page-break-after: always;">&nbsp;</p>

  {{-- @role(['superadmin','adminjusa','secretariat','user']) --}}


  <div style="">
    <table class="font" class="lampiran5" style="width: 100%;">
          <tr>
             <td colspan="7"style="text-align:right; font-family:Arial, Helvetica, sans-serif;">
                <b>LAMPIRAN 4</b>
                <br/>
                 <br/>
             </td>
          </tr>
          <tr>
             <td colspan="7" style="font-family:Arial, Helvetica, sans-serif;">
                <b>SENARAI KEPAKARAN</b>
                <br/>
                <br/>
             </td>
          </tr>
           <?php $i=0; ?>
             @if(isset($lampiran_kepakaran))
             @foreach($lampiran_kepakaran as $lk)
          <tr>
             <td style="width: 5%;vertical-align:top; font-family:Arial, Helvetica, sans-serif;">{{ $i + 1 }}.</td>
             <td colspan="6" style="font-family:Arial, Helvetica, sans-serif;">{{htmlspecialchars_decode($lk->diskripsi)}}
            </td>
          </tr>
          <tr></tr>
          <?php $i++; ?>
          @endforeach
          @else
          <tr>
             <td style="width: 5%;vertical-align:top;"></td>
             <td colspan="6"></td>
          </tr>
          <tr></tr>
          @endif

    </table>
  </div>

  <pre><br clear=all style='mso-special-character:line-break;page-break-before:always'></pre>
  <p style="page-break-after: always;">&nbsp;</p>

  <div style="">
    <table class="font" class="lampiran5" style="width: 100%;">
        <tr>
            <td colspan="7"style="text-align:right; font-family:Arial, Helvetica, sans-serif;">
               <b>LAMPIRAN 5</b>
               <br/>
                 <br/>
            </td>
         </tr>
          <tr>
             <td colspan="7" style="font-family:Arial, Helvetica, sans-serif;">
                <b>SENARAI PENCAPAIAN TERTINGGI</b>
                <br/>
                <br/>
             </td>
          </tr>

             <?php $i=0; ?>
             @if(isset($lampiran_pencapaian))
             @foreach($lampiran_pencapaian as $lpc)
          <tr>
             <td style="width: 5%;vertical-align:top; font-family:Arial, Helvetica, sans-serif;">{{ $i + 1 }}.</td>
             <td colspan="6" style="font-family:Arial, Helvetica, sans-serif;">{{htmlspecialchars_decode($lpc->diskripsi)}}

            </td>
          </tr>
          <tr></tr>
          <?php $i++; ?>
          @endforeach
          @else
          <tr>
             <td style="width: 5%;vertical-align:top;"></td>
             <td colspan="6"></td>
          </tr>
          <tr></tr>
          @endif
       </table>
        <br>
 </div>

 @endif
 {{-- @endrole --}}
</body>
</html>
