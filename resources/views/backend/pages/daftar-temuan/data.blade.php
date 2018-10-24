<header class="widget-header" style="margin-top:0px !important;padding-top:0px !important;">
	<a href="{{url('detail-form/'.(isset($daftar[0]->id) ? $daftar[0]->id : '-1').'/'.$dinas_id.'/'.$tahun.'/'.$bidang_id)}}" class="btn btn-success btn-xs pull-right">+ Tambah Detail</a>
</header>
<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="text-center" rowspan="2" style="width:15px;">#</th>
			<th class="text-center" rowspan="2">Bidang Pengawasan<br>No & Tgl LHP</th>
			<th class="text-center" rowspan="2">Temuan / Penyebab<br>(Uraian Ringkas)</th>
			<th class="text-center" colspan="2">Kode</th>
			<th class="text-center" rowspan="2">Rekomendasi<br>(Uraian Ringkas)</th>
			<th class="text-center" rowspan="2">Kode Rekomendasi</th>
			<th class="text-center" rowspan="2">Tanggapan</th>
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
							@if ($key==1)
								{{$uss->pengawasan->bidang}}
								<br><br>
								No : {{$uss->no_pengawasan}}<br>
								Tgl : {{date('d/m/Y',strtotime($uss->tgl_pengawasan))}}<br>
							@endif
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
						<td>
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
	</tbody>
</table>