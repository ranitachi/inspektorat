@extends('backend.layouts.master')

@section('title')
    <title>Daftar Termuan</title>
@endsection
@section('content')
	<div class="col-md-12">
		<div class="widget">
			<header class="widget-header">
				<span class="widget-title">Daftar Termuan</span>
                
                @if (!Auth::user()->level==3)
                    <div class="row">
                        <div class="col-md-8">&nbsp;</div>
                        <div class="col-md-3 text-right">
                            <select name="dinas_id" id="dinas_id" class="form-control text-left" data-plugin="select2" style="text-align:left !important" onchange="getdata()">
                                <option value="">-- Pilih Dinas --</option>
                                @foreach ($dinas as $item)
                                    <option value="{{$item->id}}">{{$item->nama_dinas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 text-right">
                            <select name="tahun" id="tahun" class="form-control text-left" data-plugin="select2" onchange="getdata()">
                                @for ($i = (date('Y')-5); $i <= (date('Y')); $i++)
                                    <option value="{{$i}}" {{date('Y')==$i ? 'selected="selected"' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                @endif
            </header>
            
			<hr class="widget-separator">
			<div class="widget-body">
                
				<div class="table-responsive">
                    
                    <div class="row" style="">
                        <div class="col-md-12">
                            <div id="data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footscript')
    <link rel="stylesheet" href="{{asset('theme/backend/libs/misc/datatables/datatables.min.css')}}"/>
    <script src="{{asset('theme/backend/libs/misc/datatables/datatables.min.js')}}"></script>
	<script>
        loaddata(-1,-1);
        
        function getdata()
        {
            var dinas_id=$('#dinas_id').val();
            var tahun=$('#tahun').val();
            loaddata(dinas_id,tahun);
        }
        function loaddata(dinas_id,tahun)
        {
            if(dinas_id==-1 && tahun==-1)
            {
                $('#data').load('{{url("list-temuan-data")}}',function(){
                    $('#table').DataTable();
                });
            }
            else
            {
                $('#data').load('{{url("list-temuan-data")}}/'+dinas_id+'/'+tahun,function(){
                    $('#table').DataTable();
                });
            }
        }
    </script>
@endsection
<style>
[class^="select2"]
{
    text-align:left !important;
}
</style>