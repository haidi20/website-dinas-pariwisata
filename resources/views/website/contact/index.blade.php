@extends('website._layouts.default')

@section('script-top')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    {!! Html::style('avenger/assets/plugins/sweet-alert/sweet-alert.css') !!}
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
     </style>
@endsection

@section('script-bottom')
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>
    {!! Html::script('avenger/assets/plugins/sweet-alert/sweet-alert.min.js') !!}
    <script>
        $(function () {
            showMap();
        });

        function send(){
            url     = "{{url('contact/store')}}";
            form    = $('#comment-form')
            data    = form.serializeArray()

            $.get(url, data, function(response){
                // console.log(response);
                input       = form.find('input:not([name="_token"])')
                textarea    = form.find('textarea')
                input.val('')
                textarea.val('')
                swal({
                    title: "Sudah Disimpan!",
                    text: "Pesan sudah di kirim <br><small>Dialog ini akan otomatis menutup setelah 3 detik</small>",
                    type: "success",
                    timer: 3000,
                    html: true
                });
            }).error(function(err){
                console.log(err.responseText);
            });
        }

        function showMap(){
            var latlong = ["-0.501054", "117.143388"]
            var map = L.map('map').setView(
                latlong, 
            15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: ''
            }).addTo(map);
            

            L.marker(latlong).addTo(map)
                .bindPopup('Dinas Pariwisata Kalimantan Timur')
                .openPopup();
            
            map.scrollWheelZoom.disable();
        }
    </script>
@endsection

@section('content')
<!-- block-wrapper-section
	================================================== -->
<section class="block-wrapper">
    <div id="map"></div>
    <br><br>
	<div class="container">
        <div class="row">
            <div class="col-sm-4">
                kiri
            </div>
            <div class="col-sm-8">
                <!-- contact form box -->
                    <div class="contact-form-box">
                        <div class="title-section">
                            <h1><span>Leave a Comment</span> 
                        </div>
                        <form id="comment-form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="name">Name*</label>
                                    <input id="name" name="name" type="text" >
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">E-mail*</label>
                                    <input id="email" name="email" type="text" >
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Handphone</label>
                                    <input id="phone" name="phone" type="text" >
                                </div>
                            </div>
                            <label for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" >
                            <label for="comment">Comment*</label>
                            <textarea id="comment" name="comment" ></textarea>
                            <button type="button" id="submit-contact" onClick="send()">
                                <i class="fa fa-comment"></i> Post Comment
                            </button>
                        </form>
                    </div>
                    <!-- End contact form box -->
            </div>
        </div>
        <br>
	</div>
</section>
<!-- End block-wrapper-section -->
@endsection