@extends('website._layouts.default')

@section('script-top')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
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
    <script>
        $(function () {
            var latlong = ["-0.501054", "117.143388"]
            var map = L.map('map').setView(
                latlong, 
            15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            

            L.marker(latlong).addTo(map)
                .bindPopup('Dinas Pariwisata Kalimantan Timur')
                .openPopup();
            
            map.scrollWheelZoom.disable();

        });
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
            <div class="col-sm-12">
                <!-- contact form box -->
                    <div class="contact-form-box">
                        <div class="title-section">
                            <h1><span>Leave a Comment</span> 
                        </div>
                        <form id="comment-form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="name">Name*</label>
                                    <input id="name" name="name" type="text">
                                </div>
                                <div class="col-sm-4">
                                    <label for="mail">E-mail*</label>
                                    <input id="mail" name="mail" type="text">
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Handphone</label>
                                    <input id="phone" name="phone" type="text">
                                </div>
                            </div>
                            <label for="subject">Subject</label>
                            <input id="subject" name="subject" type="text">
                            <label for="comment">Comment*</label>
                            <textarea id="comment" name="comment"></textarea>
                            <button type="submit" id="submit-contact">
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