<!-- features-today-section
================================================== -->
<section class="space-search" style="background-image: url('{{asset('images/bg-search-blur.jpg')}}'); border-top:1px solid #f0f0f0;">
    <div class="container center-search" >
        <h2>Welcome To Kalimantan Timur</h2>
        <br>
        <!-- <h3>We offer a variety of services and options</h3> -->
        <form role="search" class="search-form">
            <input type="text" id="search" name="search" placeholder="ketik judul artikel" />
            <select class="category-search" name="category" id="category">
                <option value=""  >Semua Kategori </option>
                @foreach ($categories as $index => $item)
                    <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select>
            <button class="btn" type="button">
                <i class="fa fa-search send-search"></i>
            </button>
        </form>
    </div>
</section>
<!-- End features-today-section -->