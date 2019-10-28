{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
{!! Html::script('avenger/assets/js/jquery.serializejson.min.js') !!}
<script>
    deleteCategory = function(element){
        button = $(element);
        id = button.data('id');
        caption = button.data('caption');
        url = '{{ url($moduleUrl, ['category', 'delete']) }}/' + id;
        token = $('[name="csrf-token"]').attr('content');

        swal({
            title: "Anda yakin?",
            text: "Kategori post <strong class='color5'>"+caption+"</strong> akan dihapus!",
            type: "warning",
            html: true,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        },
        function(isConfirm){

            if(isConfirm){
                $('.sweet-alert button.confirm').html('<i class="fa fa-spinner fa-spin"></i>');
            }else{
                return;
            }

            failMessage = function(){
                swal("Gagal!", "Kategori post "+caption+" gagal dihapus", "error");
            }

            $.post(url, {_token:token}, function(response){
                console.log(response);
                if(response.success){
                    swal({
                        title: "Sudah Dihapus!",
                        text: "Kategori post "+caption+" telah dihapus<br><small>Dialog ini akan otomatis menutup setelah 3 detik</small>",
                        type: "success",
                        timer: 3000,
                        html: true
                    });

                    button.parents('tr:first').remove();
                }else{
                    failMessage();
                }
            }).error(function(){
                failMessage();
            });
        });
    }

    editCategory = function(element){
        button = $(element);
        id = button.data('id');
        caption = button.data('caption');
        url = '{{ url($moduleUrl, ['category', 'edit']) }}/'+id;
        saveUrl = '{{ url($moduleUrl, ['category', 'save']) }}/'+id;
        modal = $('#form-category');
        form = modal.find('form');
        loading = modal.find('.modal-loading');

        // merubah judul modal 
        title   = modal.find('h2.modal-title');
        title.html('Edit Kategori Post');

        form.hide();
        loading.show();
        form.attr('action', saveUrl);
        button.find('i.fa').addClass('fa-spin fa-spinner');

        done = function(success){
            button.find('i.fa').removeClass('fa-spin fa-spinner');
            if( ! success ){
                swal("Gagal!", "Tidak dapat mengambil data kategori post "+caption, "error");
            }
        }

        $.get(url, function(response){

            if(response.success){
                data = response.data;
                form.find('#name').val(data.name);
                modal.modal('show');
            }

            done(response.success);
            form.show();
            loading.hide();
        }).error(function(){
           done();
        });
    }

	addCategory = function(){
        url = '{{ url($moduleUrl, ['category', 'save']) }}';
        modal = $('#form-category');
        form = modal.find('form');
        loading = modal.find('.modal-loading');
        form.attr('action', url);

        loading.hide();
        form.show();

        /* Empty All Form */
        form.find('input:not([name="_token"])').val('');

        // merubah judul modal 
        title   = modal.find('h2.modal-title');
        title.html('Buat Kategori Post');

        modal.modal('show');
    }

    saveCategory = function(modal){
        form = modal.find('form');
        url = form.attr('action');
        data = form.serializeJSON();

        done = function(success){
            modal.find('.btn-save .fa-spin').hide();
            if( ! success ){
                swal("Gagal!", "Kategori post "+data.name+" gagal disimpan", "error");
            }
        }

        $.post(url, data, function(response){
            console.log(response);
            if(response.success){
                swal({
                    title: "Sudah Disimpan!",
                    text: "Kategori post <strong class='color6'>"+data.name+"</strong> telah disimpan<br><small>Dialog ini akan otomatis menutup setelah 3 detik</small>",
                    type: "success",
                    timer: 3000,
                    html: true
                });
                modal.modal('hide');
            }
            done(response.success);
        }).error(function(){
            done(false);
        });
    }

    listCategory = function(modal){
    	loading = modal.find('.modal-loading');

    	table.hide();
    	loading.show();

        $.ajax({
            url: '{{ url($moduleUrl, ['category']) }}',
            type: 'get',
            success:function(response){
                row = new Array;
                $.each(response, function(i, d){
                    var temp = $(template);
                    temp.find('td:eq(0)').html(i + 1);
                    temp.find('td:eq(1)').html(d.name);
                    temp.find('td:eq(2)').html(d.total_post);
                    temp.find('td:eq(3)').html(d.action);
                    row.push(temp);
                });
                table.find('tbody').html(row);

                loading.hide();
                table.show();
            },
            error: function(xhr, ajaxOptions, thrownError){
                if(thrownError === 'Unauthorized'){
                    window.location.href = '{{ url('auth/logout') }}';
                }
            }
        });
    }

	$(function(){
		table = $('#table-category');
        template = table.find('tbody').html();
        $('#category').on('show.bs.modal', function(){
            modal = $(this);
            listCategory(modal);
        });

        $('#perpage').change(function() {
            this.form.submit();
        });
        
        $('#form-category').on('show.bs.modal', function(){
            modal   = $(this);
            btn     = modal.find('.btn-save');
            modal.find('form').on('submit', function(e){
                btn.click();
                return false;
            });
            btn.on('click', function(){
                $(this).find('.fa-spin').show();
                saveCategory(modal);
            });
        }).on('hide.bs.modal', function(){
            listCategory($('#category'));
            modal = $(this);
            modal.find('.btn-save').off('click');
        });
	});
</script>