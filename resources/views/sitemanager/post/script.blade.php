{!! Html::script('avenger/assets/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('avenger/assets/plugins/tinymce/jquery.tinymce.min.js') !!}

{!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
{!! Html::script('avenger/assets/js/jquery.serializejson.min.js') !!}

<script>
$(document).ready(function(){
    var $url = $('#url').val();
    var setUrl = decodeURIComponent($url);

    console.log(setUrl);
});

function numberonly(e, decimal) {
    var key;
    var keychar;

    if (window.event) {
        key = window.event.keyCode;
    }
    else if (e) {
        key = e.which;
    }
    else {
        return true;
    }
    keychar = String.fromCharCode(key);

    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==27) || (key==48) || (key==49) || (key==50) || (key==51) || 
        (key==52) || (key==53) || (key==54) || (key==55) || (key==56) || (key==57)) {
        return true;
    }
    else if (decimal && (keychar == '.')) {
        return true;
    }
    else
        return false;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(".preview-image").html("<img src='" + e.target.result + "' width='310' id='image'>");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#gallery_image").change(function () {
    readURL(this);
    $('.img-responsive').remove();
});

$('.close').on('click', function(){
    $('#image').remove();
});

function listMenu(modal){
    loading = modal.find('.modal-loading');

    table.hide();
    loading.show();

    $.get('{{ url('sitemanager', ['page', 'menu']) }}', function(response){
        row = new Array;
        $.each(response, function(i, d){
            var temp = $(template);
            temp.find('td:eq(0)').html(d.url);
            temp.find('td:eq(1)').html(d.action_link);
            row.push(temp);
        });
        table.find('tbody').html(row);

        loading.hide();
        table.show();
    });
}

function addMenu(element){
    button = $(element);
    id = button.data('id');
    url = button.data('url');
    link = button.data('link');

    $('#url').val(url);
    $('#menu_id').val(id);
    $('#link').val(link);

    modal.modal('hide');

    $('#url').prop('readonly', false);
}

function base_url(url){
   // get the segments
   pathArray = url.split( '/' );
   // find where the segment is located
   indexOfSegment = pathArray.indexOf(0);
   // make base_url be the origin plus the path to the segment
   return pathArray.slice(0,indexOfSegment).join('/') + '/';
}

function getSlugURL(link) {
    baseUrl = location.protocol + "//" + location.hostname + '/';
    return link.split(baseUrl)[1];
}

$(function(){
    @if(strtolower($moduleTitle) === 'post')
        $("#tags").select2({width: "100%", tags:{!! $tags !!} });
    @endif

    table = $('#table-menu');
    template = table.find('tbody').html();
    $('#menu').on('show.bs.modal', function(){
        modal = $(this);
        listMenu(modal);
    });

    @if(strtolower($moduleTitle) === 'page')
    var link = $('#url').val();
    if(link.length > 0){
        $('#url').prop('readonly', false);
    }else{
        $('#url').prop('readonly', true);
        $('#link').val('');
    }
    @endif

    $('#url').on('change', function(){
        var value = $(this).val();
        if(value.length > 0){
            $(this).prop('readonly', false);
            slugUrl = getSlugURL(value)
            $('#link').val(slugUrl);
        }else{
            $(this).prop('readonly', true);
            $('#link').val('');
        }
    });

    $('.editor').tinymce({
        theme: "modern",
        height: 700,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern codemirror imageupload",
        ],
        toolbar1: "insertfile undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontselect fontsizeselect",
        toolbar2: "print preview media | imageupload | forecolor backcolor | link table | template | code",
        image_advtab: true,
        templates: [
            {
                title: "Pengumuman",
                url: '{{ asset('editor-templates/pengumuman.html') }}',
                description: 'Template pengumuman'
            }
        ],
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        document_base_url: "{{ url('/') }}",
        content_css: [
                "{{ asset('css/web.css') }}"
        ],
        extended_valid_elements: "table[class=table table-bordered][style][width]",
        table_class_list: [
            {title: 'None', value: ''},
            {title: 'Dog', value: 'dog'},
            {title: 'Cat', value: 'cat'}
        ],
        codemirror: {
            path: "codemirror",
            config: {
                theme: "monokai"
            },
            cssFiles:[
                    "theme/monokai.css"
            ]
        }
    });

});
</script>