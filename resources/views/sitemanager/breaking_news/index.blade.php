@extends('sitemanager._layout.default')

@section('script-top')
{!! Html::style('avenger/assets/plugins/sweet-alert/sweet-alert.css') !!}
<style>
    .pilihan {
        border-bottom:1px solid grey;
        margin-bottom:5px;
        font-size: 14px;
    }
    .pilihan:hover {
        background-color : grey;
        color: white;
    }
    .label-left {
        display:inline-block;
        margin-right:8rem;
        padding-right:18rem;
    }
    .label-right {
        display:inline-block;
        margin-left:10rem;
    }
</style>
@endsection

@section('script-bottom')
<!-- <script src="assets/plugins/form-multiselect/js/jquery.multi-select.min.js"></script>  			Multiselect Plugin -->
{!! Html::script('avenger/assets/plugins/form-multiselect/js/jquery.multi-select.min.js') !!}
{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
	<script>
        const updateBreakingNews = (option, position) => {
            let {id, text} = option;
            let url = `${window.location.href}/edit/${id}`;
            let token   = $('[name="csrf-token"]').attr('content');
            let breaking_news = position == "left" ? 1 : 0;
            $.post(url, {_token:token, breaking_news}, function(response){
                if(position === "left"){
                    $("#select-left option:selected").remove();
                    $('#select-right').append(`<option value="${id}">${text}</option>`);
                }else if(position === "right"){
                    $("#select-right option:selected").remove();
                    $('#select-left').append(`<option value="${id}">${text}</option>`);
                }
            }).error(function(err){
                console.log(err)
            });
        };

        $(function(){
            //update left to right
            $('#btn-left').on('click', () => {
                let leftID = $('#select-left').val();
                let leftText = $('#select-left option:selected').text();
                let length = $('#select-right > option').length;

                let rightFirstEl = $('#select-right').find("option:first-child").val();
                if(rightFirstEl == ''){
                    $("#select-right option[value='']").remove();
                }
                if(leftID !== null && length < 5){
                    updateBreakingNews({id: leftID, text: leftText}, "left");
                }
                if(length >= 5){
                    swal({
                        title: "Peringatan",
                        text: "Maaf, Postingan Breaking news sudah 5",
                        type: "warning",
                        html: true,
                        confirmButtonColor: "green",
                        confirmButtonText: "Oke",
                        closeOnConfirm: false
                    })
                }
            })

            //update right to left
            $('#btn-right').on('click', () => {
                let rightID = $('#select-right').val();
                let rightText = $('#select-right option:selected').text();
                if(rightID !== null){
                    updateBreakingNews({id: rightID, text: rightText}, "right");
                }
            })

        });
    </script>
@endsection

@section('content')
<div class="static-content">
    <div class="page-content">
    
        @include('sitemanager._layout.heading')

        <div class="page-heading" style="margin-bottom:5px;">            
            <h1>Breaking News</h1>
            <div class="options">
			    <div class="btn-toolbar">
			        {{-- <a href="{{ url($moduleUrl, ['create']) }}" class="btn btn-primary">{!!fa('plus')!!} Tambah</a> --}}
			    </div>
			</div>
        </div>

        <div class="container-fluid">
            <div class="row text-center">
                <h4 class="label-left">Pilihan</h4>
                <h4 class="label-right">Ditampilkan</h4>
            </div>
        	<div class="row">
				<div class="col-md-12">

                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-1" style="text-align:center;margin-right:10px;">
                            <select size="16" class="form-control" id="select-left" multiple="">
                                @forelse($posts as $item)
                                <option class="pilihan" value="{{ $item->id }}">{{(strlen($item->title) > 50) ? substr($item->title, 0, 50)."..." : $item->title}}</option>
                                @empty
                                <option value="">&nbsp;</option>
                                @endforelse
                            </select>
                            <button id="btn-left" class="fa fa-arrow-circle-o-right fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                        <div class="col-sm-5" style="text-align:center;">
                            <select size="16" class="form-control" id="select-right" multiple="">
                                @forelse($breaking_news as $item)
                                <option class="pilihan" value="{{ $item->id }}">{{(strlen($item->title) > 50) ? substr($item->title, 0, 50)."..." : $item->title}}</option>
                                @empty
                                <option value="">&nbsp;</option>
                                @endforelse
                            </select>
                            <button id="btn-right" class="fa fa-arrow-circle-o-left fa-3x" aria-hidden="true" style="margin-top:10px; border:none; background:none;"></button>
                        </div>
                    </div>

				</div>
        	</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>
@endsection