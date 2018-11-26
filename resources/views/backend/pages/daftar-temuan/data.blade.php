@if (Auth::user()->level!=1)
	<header class="widget-header" style="margin-top:0px !important;padding-top:0px !important;">
		<a href="{{url('detail-form/'.(isset($daftar[0]->id) ? $daftar[0]->id : '-1').'/'.$dinas_id.'/'.$tahun.'/'.$bidang_id)}}" class="btn btn-success btn-xs pull-right">+ Tambah Detail</a>
	</header>
@endif
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="text-center" rowspan="2" style="width:15px;">#</th>
			<th class="text-center" rowspan="2">Bidang Pengawasan<br>No & Tgl LHP</th>
			<th class="text-center" rowspan="2">Temuan / Penyebab<br>(Uraian Ringkas)</th>
			<th class="text-center" colspan="2">Kode</th>
			<th class="text-center" rowspan="2">Rekomendasi<br>(Uraian Ringkas)</th>
			<th class="text-center" rowspan="2">Kode Rekomendasi</th>
			@if (Auth::user()->level==3)
				<th class="text-center" rowspan="2">Tanggapan</th>
			@else
				<th class="text-center" rowspan="2">Status</th>
			@endif
			<th class="text-center" rowspan="2">Harus Selesai<br>Tanggal</th>
			<th class="text-center" rowspan="2">Aksi</th>
        </tr>
        <tr>
            <th class="text-center">Temuan</th>
            <th class="text-center">Sebab</th>
        </tr>
	</thead>
	<tbody>
		@foreach ($daftar as $uss)
			@if (isset($det[$uss->id]))
			
				@foreach ($det[$uss->id] as $key=>$us)
				
					<tr>
						<td>{{ $key = $key + 1 }}</td>
						<td>
							{{-- @if ($key==1) --}}
								{{$uss->pengawasan->bidang}}
								<br><br>
								No : {{$uss->no_pengawasan}}<br>
								Tgl : {{date('d/m/Y',strtotime($uss->tgl_pengawasan))}}<br>
							{{-- @endif --}}
						</td>
						<td>
							{!! $us->uraian_temuan !!}
							<br><br>
							<b>Penyebab : </b><br>
							{!! $us->penyebab !!}
						</td>
						<td class="text-center">{{$us->temuan->code}}</td>
						<td class="text-center">{{$us->sebab->code}}</td>
						<td>{!! $us->uraian_rekomendasi !!}</td>
						<td class="text-center">{{$us->rekomendasi->code}}</td>
						<td class="text-left">
							@if (Auth::user()->level==1)
								@if ($us->flag==0)
									<span class="label label-danger">Belum Verifikasi</span>
									<br>
									<br>
									<a href="javascript:verifikasi({{$us->id}})" class="btn btn-xs btn-info"><i class="fa fa-check"></i> Verifikasi</a>
								@elseif ($us->flag==2)
									<span class="label label-success"><i class="fa fa-check"></i> Verifikasi</span>
									<span class="label label-info">Belum Ditanggapi OPD</span>
								@else
									<span class="label label-success"><i class="fa fa-eye"></i> Lihat Tanggapan</span>
								@endif
							@elseif(Auth::user()->level==2)
						
								@if ($us->flag==0)
									<span class="label label-danger">Menunggu Verifikasi</span>
								@elseif ($us->flag==2)
									<span class="label label-success"><i class="fa fa-check"></i> Verifikasi</span>
									<span class="label label-info">Belum Ditanggapi OPD</span>
								@else
									<span class="label label-success"><i class="fa fa-eye"></i> Lihat Tanggapan</span>
								@endif
							@endif
						</td>
						<td class="text-center">
							@php
								$tglbatas=adddate($uss->tgl_pengawasan,60);
								$selisih=selisihhari(date('Y-m-d'),$tglbatas,0);
								// echo $selisih;
							@endphp
							@if ($selisih<=7)
								<button class="btn btn-xs btn-danger" style="height:24px !important;"><i class="fa fa-Example of fa-exclamation-triangle"></i> {{$selisih}} Hari Lagi</button>
							@else
								<button class="btn btn-xs btn-info" style="height:24px !important;"><i class="fa fa-calendar"></i> {{date('d/m/Y',strtotime($tglbatas))}}</button>	
							@endif
							
						</td>
						<td class="text-center">
							<div style="width:80px">
								@if (Auth::user()->level==2)
									<a class="btn btn-xs btn-info btn-edit" href="{{url('list-temuan/'.$us->id.'/edit')}}" style="height:24px !important;">
										<i class="fa fa-edit"></i>
									</a>
								@endif
								<a href="javascript:hapusdetail({{$us->id}})" class="btn btn-xs btn-danger btn-delete" style="height:24px !important;">
									<i class="fa fa-trash"></i>
								</a>
							</div>
						</td>
					</tr>
				@endforeach
			@endif
	@endforeach
		{{-- @foreach ($daftar as $key => $us) --}}
			{{-- <tr>
				<td>1</td>
				<td>
					Audit Kinerja <br>
					700.138/08-Insp/I/2017 <br>
					29 Mei 2017
				</td>
				<td>
					Terdapat 2 orang Pejabat belum membuat Program Kerja, yaitu sebagai berikut:
					<br>
					- Kepala Sub Bidang Keuangan <br>
					- Kepala Sub Bidang Administratif <br>
					<br>
					Penyebab: <br>
					Pejabat yang bersangkutan belum menaati peraturan yang berlaku.
				</td>
				<td>03</td>
				<td>104</td>
				<td>
					Kepala Dinas secara tertulis memerintahkan agar segera membuat Program Kerja Tahunan untuk Tahun Anggaran 2017.
				</td>
				<td>050</td>
				@if (Auth::user()->level==3)
					<td><i style="color:red;">Belum Ada</i></td>
				@else
					<td><i style="color:green;">Sudah Verifikasi</i></td>
				@endif
				<td style="display:flex;">
					@if (Auth::user()->level==3)
						<span data-toggle="tooltip" data-title="Tanggapan">
							<a href="{{ route('tindak-lanjut.index') }}" class="btn btn-xs btn-success" style="height:24px !important;">
								<i class="fa fa-volume-up"></i>
							</a>
						</span>&nbsp;
						<span data-toggle="tooltip" data-title="Detail">
							<a class="btn btn-xs btn-primary" style="height:24px !important;">
								<i class="fa fa-list"></i>
							</a>
						</span>
					@endif
					@if (Auth::user()->level==1)
						<span data-toggle="tooltip" data-title="Verifikasi">
							<a href="" class="btn btn-xs btn-success" style="height:24px !important;">
								<i class="fa fa-check"></i>
							</a>
						</span>
					@endif
					@if (Auth::user()->level==2)
						<span data-toggle="tooltip" data-title="Ubah">
							<a href="" class="btn btn-xs btn-warning" style="height:24px !important;">
								<i class="fa fa-edit"></i>
							</a>
						</span>&nbsp;
						<span data-toggle="tooltip" data-title="Hapus">
							<a href="" class="btn btn-xs btn-danger" style="height:24px !important;">
								<i class="fa fa-trash"></i>
							</a>
						</span>
					@endif
				</td>
			</tr> --}}
	{{-- @endforeach --}}
	</tbody>
</table>