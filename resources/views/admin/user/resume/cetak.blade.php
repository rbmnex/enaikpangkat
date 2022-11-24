<?php
$fileName = 'Lampiran-doc'.".doc";

// Headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-word");
header("Pragma:no-cache");
header("Expires:0");
?>
<html>
<head><title>Resume</title>
	<style>
		.grey{
			background-color: #D1D0CE;
			height: 30px;
		}
		.outerline {
			border: 1px solid black;
/*			border-collapse: collapse;*/
			width: 100%;
			font-family:Tahoma, sans-serif;
			font-size: 8.5px;
}

.noline {
	font-family:Tahoma, sans-serif;
	font-size: 8.5px;
}

.smallbox {
	font-family:Tahoma, sans-serif;
	font-size: 8.5px;
}


.font{
	font-family:Arial, sans-serif;
	font-size: 12px;
}


.bordertop{
	border-top: 1px solid black;
	border-right: 1px solid black;
	width: 50px;

}

.righttop{
	border-top: 1px solid black;
}


.photo{
	margin-right: 50px;
	margin-top 100px;
}

div{
	page-break-after: always;
}

</style>
</head>
<body bgcolor="white">
	<div class="resume">
		<table class="outerline">
			<tr  class="grey">
				<th colspan="6" >RESUME</th>  
			</tr>
			<tr>
				<td colspan="6"><b>A.BUTIRAN PERIBADI</b></td>	
			</tr>
			<tr>
				<td colspan="5">
					<table class="noline">
						<tr>
							<td><span>&#8226;</span></td>
							<td>NAMA</td>
							<td>:</td>
							<td>{{$model['gelaran']}} {{ strtoupper($model['name']) }}</td>
						</tr>
						<tr>
							<td><span>&#8226;</span></td>
							<td>JAWATAN</td>
							<td>:</td>
							<td>{{ strtoupper($model['jawatan']) }}</td>
						</tr>
						<tr>
							<td><span>&#8226;</span></td>
							<td>KAD PENGALAMAN</td>
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
							<td> {{date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) ? date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) : ""  }}</td>
						</tr>

					</table>

				</td>
				<td class="photo">
					<img src="http://10.8.80.68/{{ $model['peribadi']['gambar'] }}"
					alt="" width="120" height="140" align="top">
				</td>

			</tr>
			<tr >
				<td colspan="2" class="bordertop"><b>B. PRESTASI</b><br>(LNPT 3 tahun terkini)</td>
				<td colspan="4" class="righttop">
					<ul>
						@if(isset($model['markah'])) 
						@foreach($model['markah'] as $markah)
						<li>{{ $markah['tahun'] }} - {{ $markah['purata'] }} % </li>
						@endforeach
						@endif	
					</ul>
				</td>
			</tr>
			<tr>
				<td colspan="2"  class="bordertop"><b>C. KEPAKARAN DAN PENGALAMAN</b><br>
					<ul>
						<li>Tempoh bidang pengkhususan</li>
						<li>Tempoh atas gred terakhir</li>
						<li>Tempoh perkhidmatan</li>
					</ul></td>
					<td colspan="4" class="righttop">
						Pengkhususan
						@if(isset($model['pengalamanPengkhususan'])) 
						@foreach($model['pengalamanPengkhususan']['khusus'] as $val) 	
						<ul>
							<li>
								{{ $val['jumlah_pengalaman']}}
							</li>
						</ul>
						@endforeach
						@endif  
						<br><br>

						<ul>
							<li>Tempoh Perkhidmatan Sektor Awam selama {{$tempoh_awam->y}} tahun</li>
							<li>Tempoh Perkhidmatan di Gred P&P selama {{$tempoh_pnp->y}} tahun</li>
						</ul>
					</td>
				</tr>

				
				<tr>
					<td colspan="2"  class="bordertop">
						<b>D. PENDEDAHAN</b><br><br>
						<table class="smallbox" >
							<tr>Majikan :   JABATAN KERJA RAYA MALAYSIA</tr>
							<tr>Skim Perkhidmatan  :PENGURUSAN DAN PROFESSIONAL</tr>
							<tr>Tarikh Mula Perkhidmatan    :{{ date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) }}</tr>
							<tr>Tarikh Bersara Wajib  : {{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</tr>
							@if($gred_sekarang->status_perkhidmatan == 'H')
							<tr>Gred Hakiki     :     {{$model['perkhidmatan']['gred_sekarang']}}</tr>
							<tr>Tarikh Mula Gred Hakiki    : {{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</tr>
							@elseif ($gred_sekarang->status_perkhidmatan == 'M')
							<tr>Gred Memangku : {{$model['perkhidmatan']['gred_sekarang']}}</tr>
							<tr>Tarikh Mula Gred Memangku :{{date('d-m-Y', strtotime($gred_sekarang->tkh_lantik))}}</tr>
							@endif
						</table>

					</td>
					<td colspan="4" class="righttop">
						<table class="smallbox" >
							<tr >
								<th >Kategori</th>
								<th >Penempatan</th>
								<th >Gred Jawatan</th>
								<th >Gelran Jawatan</th>
								<th >Tempoh Khidmat</th>
							</tr>
							@if(isset($model['pengalaman'])) 
							@foreach($model['pengalaman'] as $pengalaman) 
							<tr>
								<td >{{ $pengalaman['aktiviti'] }}</td>
								<td >{{ $pengalaman['tempat'] }}</td>
								<td >{{ $pengalaman['kod_gred_sebenar'] }}</td>
								<td >{{ $pengalaman['kod_gelaran_jawatan']}}</td>
								<td >{{date('d-m-Y', strtotime($pengalaman['mula']))  }} sehingga {{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }} </td></tr>
								@endforeach
								@endif
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="2"  class="bordertop">
							<b>E. KELAYAKAN AKADEMIK DAN PROFESSIONAL/<br>
							KELAYAKAN KOMPETENSI TEMPATAN/ <br>
						KELAYAKAN KOMPETENSI ANTARABANGSA</b></td>
							<td colspan="4" class="righttop"> 
								<table class="smallbox" >
									<tr class="grey"><td colspan="4">KELAYAKAN AKADEMIK</td></tr>
									<tr>
										<th>No</th>
										<th>Tajuk Kelulusan</th>
										<th >Institusi Pengajian</th>
										<th >Tahun Kelulusan</th>
									</tr>
									<?php $i=0; ?>
									@if(isset($model['kelayakan'])) 
									@foreach($model['kelayakan'] as $kelayakan)
									<tr><td>{{ $i + 1 }}</td>
										<td>{{ strtoupper($kelayakan['nama_kelulusan']) }}</td>
										<td >{{ strtoupper($kelayakan['institusi']) }}</td>
										<td >{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</td></tr>
										<?php $i++; ?>
										@endforeach
										@endif 
										<tr class="grey"> <td colspan="4">PROFESIONAL</td></tr>
										<tr><th>No</th>
											<th>Kelayakan Profesional /Pendaftaran Dengan Badan Profesional</th>
											<th>Badan Profesional Yang Diiktiraf</th>
											<th>No pendaftaran</th>
											<th>Tahun</th>
										</tr>
										<?php $i=0; ?>
										@if(isset($model['professional'])) 
										@foreach($model['professional'] as $professional)
										<tr><td>{{ $i + 1 }}</td>
											<td>{{ strtoupper($professional['nama_kelulusan']) }}</td>
											<td>{{ strtoupper($professional['institusi']) }}</td>
											<td>{{strtoupper($professional['no_daftar'])}}</td>
											<td>{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</td></tr>
											<?php $i++; ?>
											@endforeach

											@endif

										</table>


									</td>
								</tr>
								<tr>
									<td colspan="2" class="bordertop"><b>F. SUMBANGAN DAN KEGIATAN</b></td>
									<td colspan="4" class="righttop">
										<table class="smallbox">
											<tr  class="grey"><td colspan="4">JURNAL/BULETIN/KERTAS UTAMA</td></tr>
											@if(isset($model['jurnal'])) 
											<tr><th>No</th>
												<th>Tajuk</th>
												<th >Tahun</th></tr>
												@if(count($model['jurnal']) != 0)
												<?php $i=0; ?>
												@foreach($model['jurnal'] as $jurnal)
												<tr><td>{{ $i + 1 }}</td>
													<td>{{ strtoupper($jurnal['nama_kelulusan']) }}</td>
													<td >{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</td></tr>

													<?php $i++; ?>
													@endforeach

													@else
													<tr><td colspan="4">tiada rekod</td> </tr>
													@endif 	
													@endif

													<tr  class="grey"><td colspan="4">JAWATAN KUASA TEKNIKAL</td></tr>
													<tr>
														<th>No</th>
														<th>Jawatankuasa Teknikal</th>
														<th >Tahun</th>
													</tr>
													@if(count($model['jawatanKuasateknikal']) != 0)
													<?php $i=0; ?>
													@foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
													<tr><td>{{ $i + 1 }}</td>
														<td>{{ strtoupper($jawatanKuasateknikal['nama_kelulusan']) }}</td>
														<td>{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</td></tr>

														<?php $i++; ?>
														@endforeach
														@else
														<tr><td colspan="4">tiada rekod</td> </tr>
														@endif 
														<tr class="grey"><td colspan="4">SUMBANGAN DAN KEGIATAN DI DALAM TUGAS RASMI</td></tr>
														<tr>
															<th>No</th>
															<th>Sumbangan</th>
															<th>Tahun</th>
														</tr>
														@if(count($model['dalamTugasrasmi']) != 0)
														<?php $i=0; ?>

														@foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
														<tr><td>{{ $i + 1 }}</td>
															<td>{{ strtoupper($dalamTugasrasmi['nama_kelulusan']) }}</td>
															<td >{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</td></tr>
															<?php $i++; ?>
															@endforeach
															@else
															<tr><td colspan="4">tiada rekod</td> </tr>
															@endif
															<tr class="grey"><td colspan="4">SUMBANGAN DAN KEGIATAN DI LUAR TUGAS RASMI</td></tr>
															<tr>
																<th>No</th>
																<th>Sumbangan</th>
																<th>Tahun</th>
															</tr>
															@if(count($model['luarTugasrasmi']) != 0)
															<?php $i=0; ?>

															@foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
															<tr><td>{{ $i + 1 }}</td>
																<td>{{ strtoupper($luarTugasrasmi['nama_kelulusan']) }}</td>
																<td >{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</td></tr>
																<?php $i++; ?>
																@endforeach
																@else
																<tr><td colspan="4">tiada rekod</td> </tr>
																@endif

															</table>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="bordertop"><b>G.PENGIKTIRAFAN</b></td>
														<td colspan="4" class="righttop">
															<table class="smallbox">
																<tr class="grey"><td colspan="4">APC</td></tr>
																<tr>
																	<th> No</th>
																	<th >APC</th>
																	<th >Tahun</th>

																</tr>
																@if(count($model['aPC']) != 0)
																<?php $i=0; ?>

																@foreach($model['aPC'] as $aPC)
																<tr><td width="10px" >{{ $i + 1 }}</td>
																	<td width="550px" >{{ strtoupper($aPC['kod_peristiwa']) }}</td>
																	<td >{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</td></tr>
																	<?php $i++; ?>
																	@endforeach
																	@else
																	<tr><td colspan="3">tiada rekod</td> </tr>
																	@endif  
																	<tr class="grey"><td colspan="4">PINGAT</td></tr>
																	<tr>
																		<th>No</th>
																		<th>Pingat</th>
																		<th >Tahun</th>
																	</tr>
																	@if(count($model['pingat']) != 0)
																	<?php $i=0; ?>

																	@foreach($model['pingat'] as $pingat)
																	<tr><td width="10px" >{{ $i + 1 }}</td>
																		<td width="550px" >{{ strtoupper($pingat['kod_peristiwa']) }}</td>
																		<td >{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</td></tr>
																		<?php $i++; ?>
																		@endforeach
																		@else
																		<tr><td colspan="3">tiada rekod</td> </tr>
																		@endif  
																		<tr class="grey"><td colspan="4">ANUGERAH UMUM</td></tr> 
																		<tr>
																			<th>No</th>
																			<th>Anugerah Umum</th>
																			<th >Tahun</th>
																		</tr>
																		@if(count($model['anugerahUmum']) != 0)
																		<?php $i=0; ?>

																		@foreach($model['anugerahUmum'] as $anugerahUmum)
																		<tr><td width="10px" >{{ $i + 1 }}</td>
																			<td width="550px" >{{ strtoupper($anugerahUmum['kod_peristiwa']) }}</td>
																			<td >{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</td></tr>
																			<?php $i++; ?>
																			@endforeach
																			@else
																			<tr><td colspan="3">tiada rekod</td> </tr>
																			@endif   
																		</table>

																	</td>
																</tr>



															</table>




															<div class="lampiran2">
																<table class="font">
																	<tr>
																		<td colspan="6" style="text-align:right"><h5>LAMPIRAN 2</h5></td>
																	</tr>
																	<tr>
																		<td colspan="6">
																			<h5>KURSUS DAN SEMINAR YANG DIHADIRI</h5>
																		</td>
																	</tr>
																	<tr>
																		<?php $i=0; ?>
																		@if(isset($lampiran_kursus)) 
																		@foreach($lampiran_kursus as $lk)
																		<tr><td>{{ $i + 1 }}.</td>
																			<td colspan="4">{{ $lk->nama_kursus }},<br>({{date('d-m-Y', strtotime($lk->tkh_mula))}} - {{date('d-m-Y', strtotime($lk->tkh_tamat))}}) , {{$lk->tempat}}</td>
																		</tr>
																		<?php $i++; ?>
																		@endforeach
																	@endif  </tr>
																</table><br>
															</div>
															<div class="lampiran3">
																<table class="font">
																	<tr>
																		<td colspan="6" style="text-align:right"><h5>LAMPIRAN 3</h5></td>
																	</tr>
																	<?php 
																	// A few settings
																	// $image =url('/').$lampiran_beban->path;

																	// // Read image path, convert to base64 encoding
																	// $imageData = base64_encode(file_get_contents($image));

																	// // Format the image SRC:  data:{mime};base64,{data};
																	// $src = 'data:'.mime_content_type($image).';base64,'.$imageData;

																	// // Echo out a sample image
																	// echo '<img src="',$src,'">';
																	?>
																	<tr>																	</tr>
																</table><br>
															</div>
															<table class="font">
																<tr>
																	<td colspan="6" style="text-align:right"><h5>LAMPIRAN 4</h5></td>
																</tr>
																<tr>
																	<td colspan="6">
																		<h5>SENARAI PROJEK BESERTA KOS(DI PENEMPATAN SEMASA SAHAJA)</h5>
																	</td>
																</tr>
																<tr>
																	<?php $i=0; ?>
																	@if(isset($lampiran_kursus)) 
																	@foreach($lampiran_projek as $lp)
																	<tr><td>{{ $i + 1 }}.</td>

																		<td colspan="4">{{ $lp->nama_projek }},<br>Kos Projek: RM{{number_format($lp->kos_projek,2)}}</td>
																	</tr>
																	<?php $i++; ?>
																	@endforeach
																@endif  </tr>
															</table>
														</body>
														</html>