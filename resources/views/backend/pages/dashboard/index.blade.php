@extends('backend.layouts.master')

@section('title')
	<title>Dashboard</title>
@endsection
@section('content')
	@php
		$daftar=\App\Models\DaftarTemuan::all();
        $d=$selesai=$baru=$tujuh=$enampuluh=array();
        foreach($daftar as $k=>$v)
        {
            $selisih=selisihhari($v->created_at,date('Y-m-d'));
            $d[]=$v;
            if($v->flag==1)
                $selesai[]=$v;
            else
            {
                if($selisih<=7)
                    $baru[]=$v;
                
                if($selisih>43 && $selisih<=60)
                    $tujuh[]=$v;
                
                if($selisih>60)
                    $enampuluh[]=$v;
            }
        }
	@endphp
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">{{$daftar->count()}}</span></h3>
							<small class="text-color">Total Temuan</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
					</div>
					<footer class="widget-footer bg-primary">
						<small>Temuan Selesai</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">{{count($enampuluh)}}</span></h3>
							<small class="text-color">Jumlah Temuan</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<small>&gt; 60 Hari Tindak Lanjut</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">{{count($selesai)}}</span></h3>
							<small class="text-color">Jumlah Temuan</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<footer class="widget-footer bg-success">
						<small>Selesai</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp">{{count($tujuh)}}</span></h3>
							<small class="text-color">Jumlah temuan</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
					</div>
					<footer class="widget-footer bg-warning">
						<small>Batas Tidak Lanjut</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"><canvas width="33" height="16" style="display: inline-block; width: 33px; height: 16px; vertical-align: top;"></canvas></span>
					</footer>
				</div><!-- .widget -->
			</div>
		</div>
	</div>
@endsection