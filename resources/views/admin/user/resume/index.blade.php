<html>
<head><title>Resume</title>
	<style>
		table, th, td {
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
	
</style>
</head>
<body bgcolor="white">

	<table>
		<tr>
			<th colspan="6" style="background-color: grey";>RESUME</th>   
		</tr>
		<tr>
			<td colspan="6"><b>A.BUTIRAN PERIBADI</b></td>	
		</tr>
		<tr>
			<td colspan="5">
				<ul>
					<li>Nama           :  {{ $model['name'] }} </li>
					<li>Jawatan        : {{ $model['jawatan'] }}</li>
					<li>No. Kad Pengenalan:{{ $model['nokp'] }}</li>
					<li>Tarikh Lahir   :  {{ date('d-m-Y', strtotime($model['peribadi']['tkh_lahir'])) }} </li>
					<li>Tempat Lahir    : {{ $model['peribadi']['tempat_lahir'] }} </li>
					<li>Taraf Perkahwinan :  {{ $model['peribadi']['taraf_perkahwinan'] }} </li>
					<li>No. Telefon       : {{ $model['tel_pejabat'] }}</li>
					<li>HP       :{{ $model['peribadi']['tel_bimbit']}}</li>
					<li>No. Fax     :{{ $model['peribadi']['no_fax'] }} </li>
					<li>Email    :  {{ $model['email'] }}  </li>
					<li>Tarikh Pengisytiharan Harta Terkini :  {{date('d-m-Y', strtotime($model['isytiharHarta']['tkh_mula_peristiwa'])) }}</li><br>
					<li>Alamat Pejabat:{{ $model['alamat_pejabat'] }}</li><br>
					<li>Alamat Rumah:{{ $model['peribadi']['alamat_rumah'] }}</li>
				</ul>
			</td>
			<td colspan="1">
				<img src="http://10.8.80.68/{{ $model['peribadi']['gambar'] }}"
				alt="" width="120" height="140" align="top">
			</td>

			</tr>
		</table>
		<table>
			<tr>
				<td style="width:30%"><b>B. PRESTASI </br>(LNPT 3 tahun terkini)</b></td>	
				<td >
					<table class="noborder">
						<tr><td>Tahun</td>
							<td>Purata</td></tr>

							@if(isset($model['markah'])) 
							@foreach($model['markah'] as $markah) 	
							<tr>
								<td>{{ $markah['tahun'] }}</td>
								<td>{{ $markah['purata'] }}</td>
							</tr>
							@endforeach
							@endif 
						</table>
					</td>
				</tr>
		</table>
		<table>
			<tr>
				<td style="width:30%">
				<b>C. KEPAKARAN DAN PENGALAMAN</b></br>
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
						<td>
							Perkhidmatan Sektor Awam selama {{$tempoh_awam->y}} tahun
						</td>
						</tr>


					</table>
					<br>
					
					 

				</td>

			</tr>
		</table>
		<table>
			<tr>
				<td colspan="6"><b>D. PENDEDAHAN</b></td>	
			</tr>
			<tr><td colspan="6">
				<ul>
					<li>Majikan :   JABATAN KERJA RAYA MALAYSIA</li>
					<li>Skim Perkhidmatan  :PENGURUSAN DAN PROFESSIONAL</li>
					<li>Tarikh Mula Perkhidmatan    :{{ date('d-m-Y', strtotime($mula_khidmat->tkh_lantik)) }}</li>
					<li>Tarikh Bersara Wajib  : {{date('d-m-Y', strtotime($model['peribadi']['tkh_wajib_bersara']))}}</li>
					<li>Gred Hakiki     :     {{$model['perkhidmatan']['gred_hakiki']}}</li>
					<li>Tarikh Mula Gred Hakiki    : {{date('d-m-Y', strtotime($mula_gred_hakiki->tkh_lantik))}}</li>
				</ul>


				@if(isset($model['pengalaman'])) 
				@foreach($model['pengalaman'] as $pengalaman) 	
				<table>
					<tr>
						<td style="width:30%">Kategori</td>
						<td>{{ $pengalaman['aktiviti'] }}</td>
					</tr>
					<tr>
						<td>Penempatan</td>
						<td>{{ $pengalaman['tempat'] }}</td>
					</tr>
					<tr>
						<td>Gred Jawatan</td>
						<td>{{ $pengalaman['kod_gred_sebenar'] }}</td>
					</tr>
					<tr>
						<td>Gelaran Jawatan</td>
						<td>{{ $pengalaman['kod_gelaran_jawatan'] }}</td>
					</tr>
					<tr>
						<td>Tempoh Khidmat</td>
						<td>{{date('d-m-Y', strtotime($pengalaman['mula']))  }} sehingga {{ date('d-m-Y', strtotime($pengalaman['tamat'] )) }} </td>
					</tr>
				</table>
				<br>
				@endforeach
				@endif 

			</td>
		</tr>
	</table>
	<table>
		<tr><td colspan="6"><b>E. KELAYAKAN AKADEMIK DAN PROFESSIONAL</b></td>	</tr>
		<tr><td colspan="6">AKADEMIK</td></tr>
		<tr>
			<tr>
				<th >No</th>
				<th colspan="2">Tajuk Kelulusan</th>
				<th colspan="2">Institusi Pengajian</th>
				<th>Tahun Kelulusan</th>
			</tr>
			<?php $i=0; ?>
			@if(isset($model['kelayakan'])) 
			@foreach($model['kelayakan'] as $kelayakan)
			<tr><td>{{ $i + 1 }}</td>
				<td colspan="2">{{ $kelayakan['nama_kelulusan'] }}</td>
				<td colspan="2">{{ $kelayakan['institusi'] }}</td>
				<td>{{ date('Y', strtotime($kelayakan['tkh_kelulusan'])) }}</td></tr>
				<?php $i++; ?>
				@endforeach

				@endif  
			</table><br>
	<table>
			<tr><td colspan="6">PROFESIONAL</td></tr>
			<tr>
				<th>No</th>
				<th colspan="2">Kelayakan Profesional /Pendaftaran Dengan Badan Profesional</th>
				<th>Badan Profesional Yang Diiktiraf</th>
				<th>No pendaftaran</th>
				<th>Tahun</th>
			</tr>
			<?php $i=0; ?>
			@if(isset($model['professional'])) 
			@foreach($model['professional'] as $professional)
			<tr><td>{{ $i + 1 }}</td>
				<td colspan="2">{{ $professional['nama_kelulusan'] }}</td>
				<td>{{ $professional['institusi'] }}</td>
				<td>{{$professional['no_daftar']}}</td>
				<td>{{ date('Y', strtotime($professional['tkh_kelulusan'])) }}</td></tr>
				<?php $i++; ?>
				@endforeach

				@endif  
			</table><br>
			<table>
				<tr><td colspan="6"><b>F. SUMBANGAN DAN KEGIATAN</b></td></tr>
				@if(isset($model['jurnal'])) 
				<tr><td colspan="6">Jurnal/buletin/kertas utama</td></tr>
				<tr>
					<?php $i=0; ?>

					@foreach($model['jurnal'] as $jurnal)
					<tr><td>{{ $i + 1 }}</td>
						<td colspan="4">{{ $jurnal['nama_kelulusan'] }}</td>
						<td>{{ date('Y', strtotime($jurnal['tkh_kelulusan'])) }}</td></tr>

						<?php $i++; ?>
						@endforeach

					</tr>@endif
				</table><br>
				<table>
					@if(isset($model['jawatanKuasateknikal'])) 
					<tr><td colspan="6">Jawatan Teknikal</td></tr>
					<tr>
						<?php $i=0; ?>

						@foreach($model['jawatanKuasateknikal'] as $jawatanKuasateknikal)
						<tr><td>{{ $i + 1 }}</td>
							<td colspan="4">{{ $jawatanKuasateknikal['nama_kelulusan'] }}</td>
							<td>{{ date('Y', strtotime($jawatanKuasateknikal['tkh_kelulusan'])) }}</td></tr>

							<?php $i++; ?>
							@endforeach

							</tr>@endif 

				</table><br>
				<table> 
<tr><td colspan="6">Sumbangan dan Kegiatan di dalam Tugas Rasmi</td></tr>
<tr>
	<?php $i=0; ?>
	@if(isset($model['dalamTugasrasmi'])) 
	@foreach($model['dalamTugasrasmi'] as $dalamTugasrasmi)
	<tr><td>{{ $i + 1 }}</td>
		<td colspan="4">{{ $dalamTugasrasmi['nama_kelulusan'] }}</td>
		<td>{{ date('Y', strtotime($dalamTugasrasmi['tkh_kelulusan'])) }}</td></tr>
		<?php $i++; ?>
		@endforeach

		@endif  
	</tr>

</table><br>
<table>
	<tr><td colspan="6">Sumbangan dan Kegiatan di luar Tugas Rasmi</td></tr>
	<tr>
		<?php $i=0; ?>
		@if(isset($model['luarTugasrasmi'])) 
		@foreach($model['luarTugasrasmi'] as $luarTugasrasmi)
		<tr><td>{{ $i + 1 }}</td>
			<td colspan="4">{{ $luarTugasrasmi['nama_kelulusan'] }}</td>
			<td>{{ date('Y', strtotime($luarTugasrasmi['tkh_kelulusan'])) }}</td></tr>
			<?php $i++; ?>
			@endforeach

			@endif  
		</tr></table><br>
		<table>
			<tr><td colspan="6"><b>G. PENGIKHTIRAFAN</b></td></tr>
			<tr><td colspan="6">APC</td></tr>
			<tr>
				<?php $i=0; ?>
				@if(isset($model['aPC'])) 
				@foreach($model['aPC'] as $aPC)
				<tr><td>{{ $i + 1 }}</td>
					<td colspan="4">{{ $aPC['kod_peristiwa'] }}</td>
					<td>{{date('Y', strtotime($aPC['tkh_mula_peristiwa']))  }}</td></tr>
					<?php $i++; ?>
					@endforeach

					@endif  
				</tr>

			</table><br>
			<table>
				<tr><td colspan="6">Pingat</td></tr>
				<tr>
					<?php $i=0; ?>
					@if(isset($model['pingat'])) 
					@foreach($model['pingat'] as $pingat)
					<tr><td>{{ $i + 1 }}</td>
						<td colspan="4">{{ $pingat['kod_peristiwa'] }}</td>
						<td>{{date('Y', strtotime($pingat['tkh_mula_peristiwa']))  }}</td></tr>
						<?php $i++; ?>
						@endforeach

						@endif  
					</tr>
					<tr><td colspan="6">Anugerah Umum</td></tr>
					<tr>
						<?php $i=0; ?>
						@if(isset($model['anugerahUmum'])) 
						@foreach($model['anugerahUmum'] as $anugerahUmum)
						<tr><td>{{ $i + 1 }}</td>
							<td colspan="4">{{ $anugerahUmum['kod_peristiwa'] }}</td>
							<td>{{date('Y', strtotime($anugerahUmum['tkh_mula_peristiwa']))  }}</td></tr>
							<?php $i++; ?>
							@endforeach

							@endif  
						</tr>
					</table><br>
					<table>
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
						<tr><td>{{ $i + 1 }}</td>
							<td colspan="4">{{ $lk->nama_kursus }},({{date('d-m-Y', strtotime($lk->tkh_mula))}} - {{date('d-m-Y', strtotime($lk->tkh_tamat))}}), {{$lk->tempat}}</td>
							</tr>
							<?php $i++; ?>
							@endforeach
							@endif  </tr>
					</table><br>
							<table>
						<tr>
							<td colspan="6" style="text-align:right"><h5>Lampiran 3</h5></td>
						</tr>
						<tr>
							<td colspan="6">
								<h5>SENARAI TUGAS PEGAWAI (DI PENEMPATAN SEMASA)</h5>
							</td>
						</tr>
						<tr>
							<?php $i=0; ?>
							@if(isset($lampiran_kursus)) 
						@foreach($lampiran_kursus as $lk)
						<tr><td>{{ $i + 1 }}</td>
							<td colspan="4"></td>
							</tr>
							<?php $i++; ?>
							@endforeach
							@endif  </tr>
					</table><br>
							<table>
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
						<tr><td>{{ $i + 1 }}</td>
							<?php 
							$kp = number_format($lp->kos_projek, 2, '.', '');
							?>
							<td colspan="4">{{ $lp->nama_projek }},Kos Projek: RM{{$kp}}</td>
							</tr>
							<?php $i++; ?>
							@endforeach
							@endif  </tr>
					</table>
				</body>
				</html>