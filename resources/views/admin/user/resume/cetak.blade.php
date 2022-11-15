<html>
<head><title>Resume</title>
	<style>
		.grey{
			background-color: #D1D0CE;
		}
		.outerline {
			border: 1px solid black;
			border-collapse: collapse;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
		}

		.font{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 12px;
		}

		.rightborder{
			border-right: 1px solid black;
			width: 40%;

		}
		.full{
			border: 1px solid black;
			border-collapse: collapse;
		}

		table{
			width:100%
		}

		.noborder{
			border: 0px solid black;
			border-collapse: collapse;
		}
		div{
			page-break-after: always;
		}

	</style>
</head>
<body bgcolor="white">
	<div class="resume">
	<table class="outerline">
		<tr class="grey">
			<th>RESUME</th>  
			<th></th> 
		</tr>
		<tr>
			<td><b>A.BUTIRAN PERIBADI</b></td>	
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Nama</td>
						<td>:</td>
						<td>{{ strtoupper($model['name']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Jawatan</td>
						<td>:</td>
						<td>{{ strtoupper($model['jawatan']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Kad Pengenalan</td>
						<td>:</td>
						<td>{{ strtoupper($model['nokp']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Tarikh Lahir</td>
						<td>:</td>
						<td>{{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Tempat lahir</td>
						<td>:</td>
						<td> {{ strtoupper($model['peribadi']['tempat_lahir']) }} </td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Alamat Pejabat</td>
						<td>:</td>
						<td>{{ strtoupper($model['alamat_pejabat']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Alamat Rumah</td>
						<td>:</td>
						<td>{{ strtoupper($model['peribadi']['alamat_rumah']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Taraf Perkahwinan</td>
						<td>:</td>
						<td>{{ strtoupper($model['peribadi']['taraf_perkahwinan']) }} </td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>No. Telefon Pejabat</td>
						<td>:</td>
						<td>{{ strtoupper($model['tel_pejabat']) }}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>No. Telefon Bimbit</td>
						<td>:</td>
						<td>{{ strtoupper($model['peribadi']['tel_bimbit'])}}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>No Fax</td>
						<td>:</td>
						<td>{{ strtoupper($model['peribadi']['no_fax'] )}}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Emel</td>
						<td>:</td>
						<td>{{ $model['email']}}</td>
					</tr>
					<tr>
						<td><span>&#8226;</span></td>
						<td>Tarikh Pengisytiharan Harta</td>
						<td>:</td>
						<td> {{date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) ? date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) : ""  }}</td>
					</tr>

				</table>
				
			</td>
			<td>
				<img src="http://10.8.80.68/{{ $model['peribadi']['gambar'] }}"
				alt="" width="120" height="140" align="top">
			</td>

		</tr>
	</table>
	<table class="outerline ">
		<tr>
			<td class="rightborder"><b>B. PRESTASI</b> </br><span>&#8226;</span>(LNPT 3 tahun terkini)</td>	
			<td>
				<table class="noborder">
					<br>
					@if(isset($model['markah'])) 
					@foreach($model['markah'] as $markah) 	
					<tr>
						<td>{{ $markah['tahun'] }} - {{ $markah['purata'] }} %</td>
					</tr>
					@endforeach
					@endif
					<br> 
				</table>
			</td>
		</tr>
	</table>
	<table class="outerline">
		<tr>
			<td class="rightborder"><b>C. KEPAKARAN DAN PENGALAMAN</b></br>
				<ul>
					<li>Tempoh bidang pengkhususan</li>
					<li>Tempoh atas gred terakhir</li>
					<li>Tempoh perkhidmatan</li>
				</ul>
			</td>	
			<td>
				<table>
					<tr>
						<td>Pengkhususan
							@if(isset($model['pengalamanPengkhususan'])) 
							@foreach($model['pengalamanPengkhususan'] as $pengalamanPengkhususan) 	
							<?php 
							$date1 = new DateTime($pengalamanPengkhususan['mula']);
							$date2 = new DateTime($pengalamanPengkhususan['tamat']);
							$interval = $date1->diff($date2);
							?>
							@if ($pengalamanPengkhususan['kod_aktiviti'] >= 50)
							<ul>
								<li>{{ $pengalamanPengkhususan['aktiviti'] }} selama {{$interval->y}} tahun, {{ $interval->m}} bulan   
								</li>
							</ul>
							@endif	
							@endforeach
							@endif  
						</td></tr>
						<td><ul>
							<li>Tempoh Perkhidmatan Sektor Awam selama {{$tempoh_awam->y}} tahun</li>
							<li>Tempoh Perkhidmatan di Gred P&P selama {{$tempoh_pnp->y}} tahun</li>
						</ul>

					</td>
				</tr>
			</table>
			
			<table class="outerline">
				<tr>
					<td class="rightborder"><b>D. PENDEDAHAN</b>
						<ul>
							<li>Majikan :   JABATAN KERJA RAYA MALAYSIA</li>
							<li>Skim Perkhidmatan  :PENGURUSAN DAN PROFESSIONAL</li>
							<li>Tarikh Mula Perkhidmatan    :{{ date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) }}</li>
							<li>Tarikh Bersara Wajib  : {{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</li>
							<li>Gred Hakiki     :     {{$model['perkhidmatan']['gred_hakiki']}}</li>
							<li>Tarikh Mula Gred Hakiki    : {{date('d-m-Y', strtotime($mula_gred_hakiki->tkh_lantik))}}</li>
						</ul></td>	
						<td>
							<table class="full">
								<tr class="full">
									<th class="full">Kategori</th>
									<th class="full">Penempatan</th>
									<th class="full">Gred Jawatan</th>
									<th class="full">Gelran Jawatan</th>
									<th class="full">Tempoh Khidmat</th>
								</tr>
								@if(isset($model['pengalaman'])) 
								@foreach($model['pengalaman'] as $pengalaman) 
								<tr>
									<td class="full">{{ $pengalaman['aktiviti'] }}</td>
									<td class="full">{{ $pengalaman['tempat'] }}</td>
									<td class="full">{{ $pengalaman['kod_gred_sebenar'] }}</td>
									<td class="full">{{ $pengalaman['kod_gelaran_jawatan']}}</td>
									<td class="full">{{date('d-m-Y', strtotime($pengalaman['mula']))  }} sehingga {{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }} </td></tr>
									@endforeach
									@endif
								</table>
							</td>
						</tr>
					</table>
					<table class="outerline">
						<tr><td><b>E. KELAYAKAN AKADEMIK DAN PROFESSIONAL</b></td>	</tr>
						<tr><td class="grey">AKADEMIK</td></tr>
						<tr><table class="full">
							<tr>
								<th class="full">No</th>
								<th class="full">Tajuk Kelulusan</th>
								<th class="full">Institusi Pengajian</th>
								<th class="full">Tahun Kelulusan</th>
							</tr>
							<?php $i=0; ?>
							@if(isset($model['kelayakan'])) 
							@foreach($model['kelayakan'] as $kelayakan)
							<tr><td class="full">{{ $i + 1 }}</td>
								<td class="full">{{ strtoupper($kelayakan['nama_kelulusan']) }}</td>
								<td class="full">{{ strtoupper($kelayakan['institusi']) }}</td>
								<td class="full">{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</td></tr>
								<?php $i++; ?>
								@endforeach

								@endif  
							</table>
						</tr><br>


						<tr class="grey"><td>PROFESIONAL</td></tr>
						<tr>
							<table class="full">
								<tr>			
									<th class="full">No</th>
									<th class="full">Kelayakan Profesional /Pendaftaran Dengan Badan Profesional</th>
									<th class="full">Badan Profesional Yang Diiktiraf</th>
									<th class="full">No pendaftaran</th>
									<th class="full">Tahun</th>
								</tr>
								<?php $i=0; ?>
								@if(isset($model['professional'])) 
								@foreach($model['professional'] as $professional)
								<tr><td class="full">{{ $i + 1 }}</td>
									<td class="full">{{ strtoupper($professional['nama_kelulusan']) }}</td>
									<td class="full">{{ strtoupper($professional['institusi']) }}</td>
									<td class="full">{{strtoupper($professional['no_daftar'])}}</td>
									<td class="full">{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</td></tr>
									<?php $i++; ?>
									@endforeach

									@endif  
								</table></tr><br>
								<table class="outerline">
									<tr><td><b>F. SUMBANGAN DAN KEGIATAN</b></td></tr>

									@if(isset($model['jurnal'])) 
									<tr class="grey"><td colspan="3">Jurnal/buletin/kertas utama</td></tr>
									<tr>
										<table class="full">
											<tr>
												<th class="full" class="full">No</th>
												<th class="full" class="full">Tajuk</th>
												<th class="full" class="full">Tahun</th>
											</tr>
											<?php $i=0; ?>
											@foreach($model['jurnal'] as $jurnal)
											<tr><td class="full" class="full">{{ $i + 1 }}</td>
												<td class="full" class="full">{{ strtoupper($jurnal['nama_kelulusan']) }}</td>
												<td class="full" class="full">{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</td></tr>

												<?php $i++; ?>
												@endforeach
												@endif
											</table>
										</tr>
									<br>
									<table class="full">
										
										<tr class="grey" colspan="3"><td>Jawatan Teknikal</td></tr>
										<tr>
											<table class="full">
												<tr>
													<th class="full">No</th>
													<th class="full">Tajuk</th>
													<th class="full">Tahun</th>
												</tr>
												@if(count($model['jawatanKuasateknikal']) != 0)
												<?php $i=0; ?>
												@foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
												<tr><td class="full">{{ $i + 1 }}</td>
													<td class="full">{{ strtoupper($jawatanKuasateknikal['nama_kelulusan']) }}</td>
													<td class="full">{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</td></tr>

													<?php $i++; ?>
													@endforeach
													@else
													<tr><td colspan="3">tiada rekod</td> </tr>
													@endif 
													
												</table>
											</tr>

										</table><br>
										<table class="full"> 
											<tr class="grey" colspan="3"><td>Sumbangan dan Kegiatan di dalam Tugas Rasmi</td></tr>
											<tr>
												<table class="full">
													<tr>
														<th class="full">No</th>
														<th class="full">Tajuk</th>
														<th class="full">Tahun</th>
													</tr>
													@if(count($model['dalamTugasrasmi']) != 0)
													<?php $i=0; ?>
													
													@foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
													<tr><td class="full">{{ $i + 1 }}</td>
														<td class="full">{{ strtoupper($dalamTugasrasmi['nama_kelulusan']) }}</td>
														<td class="full">{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</td></tr>
														<?php $i++; ?>
														@endforeach
													@else
													<tr><td colspan="3">tiada rekod</td> </tr>
													@endif   
													</tr>
												</table>

											</table><br>
											<table class="full">
												<tr class="grey"><td>Sumbangan dan Kegiatan di luar Tugas Rasmi</td></tr>
												<tr>
													<table class="full">
														<tr>
															<th class="full" >No</th>
															<th class="full" >Tajuk</th>
															<th class="full" >Tahun</th>
														</tr>
														@if(count($model['luarTugasrasmi']) != 0)
														<?php $i=0; ?>
														
														@foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
														<tr><td class="full" >{{ $i + 1 }}</td>
															<td class="full" >{{ strtoupper($luarTugasrasmi['nama_kelulusan']) }}</td>
															<td class="full" >{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</td></tr>
															<?php $i++; ?>
															@endforeach
															@else
															<tr><td colspan="3">tiada rekod</td> </tr>
															@endif   
														</table>  
													</tr></table><br>
													<table class="outerline">
														<tr><td><b>G. PENGIKHTIRAFAN</b></td></tr>
														<tr class="grey" colspan="3"><td>APC</td></tr>
														<tr>
															<table class="full">
																<tr>
																	<th class="full">No</th>
																	<th class="full">Tajuk</th>
																	<th class="full">Tahun</th>
																</tr>
																@if(count($model['aPC']) != 0)
																<?php $i=0; ?>
																
																@foreach($model['aPC'] as $aPC)
																<tr><td class="full">{{ $i + 1 }}</td>
																	<td class="full">{{ strtoupper($aPC['kod_peristiwa']) }}</td>
																	<td class="full">{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</td></tr>
																	<?php $i++; ?>
																	@endforeach
																	@else
																	<tr><td colspan="3">tiada rekod</td> </tr>
																	@endif   
																</table> 
															</tr>

														</table><br>
														<table>
															<tr class="grey" colspan="3"><td>Pingat</td></tr>
															<tr>
																<table class="full">
																	<tr>
																		<th class="full">No</th>
																		<th class="full">Tajuk</th>
																		<th class="full">Tahun</th>
																	</tr>
																	@if(count($model['pingat']) != 0)
																	<?php $i=0; ?>
																	
																	@foreach($model['pingat'] as $pingat)
																	<tr><td class="full">{{ $i + 1 }}</td>
																		<td class="full">{{ strtoupper($pingat['kod_peristiwa']) }}</td>
																		<td class="full">{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</td></tr>
																		<?php $i++; ?>
																		@endforeach
																		@else
															<tr><td colspan="3">tiada rekod</td> </tr>
															@endif   
																	</table>
																</tr>
																<tr class="grey" colspan="3"><td>Anugerah Umum</td></tr>
																<tr>
																	<table class="full">
																	<tr>
																		<th class="full">No</th>
																		<th class="full">Tajuk</th>
																		<th class="full">Tahun</th>
																	</tr>
																	@if(count($model['anugerahUmum']) != 0)
																	<?php $i=0; ?>
																	
																	@foreach($model['anugerahUmum'] as $anugerahUmum)
																	<tr><td class="full">{{ $i + 1 }}</td>
																		<td class="full">{{ strtoupper($anugerahUmum['kod_peristiwa']) }}</td>
																		<td class="full">{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</td></tr>
																		<?php $i++; ?>
																		@endforeach
																		@else
															<tr><td colspan="3">tiada rekod</td> </tr>
															@endif   
																		</table>
																	</tr>
																</table><br>
			</div>
			<div class="lampiran2">
																<table class="font">
																	<tr>
																		<td colspan="6" style="text-align:right"><h5>Lampiran 2</h5></td>
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
																			<td colspan="4">{{ $lk->nama_kursus }},({{date('d-m-Y', strtotime($lk->tkh_mula))}} - {{date('d-m-Y', strtotime($lk->tkh_tamat))}}), {{$lk->tempat}}</td>
																		</tr>
																		<?php $i++; ?>
																		@endforeach
																	@endif  </tr>
																</table><br>
				</div>
				<div class="lampiran3">
																<table>
																	<tr>
																		<td colspan="6" style="text-align:right"><h5>Lampiran 3</h5></td>
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
																		<td colspan="6" style="text-align:right"><h5>Lampiran 4</h5></td>
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