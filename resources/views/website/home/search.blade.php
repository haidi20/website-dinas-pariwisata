<!-- features-today-section
================================================== -->


<section class="space-search" style="background-image: url('{{asset('images/bg-search.png')}}')">
    <div class="container center-search" >
        <h2>Welcome To Kalimantan Timur</h2>
        <h3>We offer a variety of services and options</h3>
        <form role="search" class="search-form" method="get" action="{{url('post')}}">
            <input type="text" id="search" name="search" placeholder="what are you looking for?" />
            <select class="category-search" name="category" id="">
                <option value=""  >Semua Kategori </option>
                @foreach ($categories as $index => $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <button class="btn" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</section>
<!-- End features-today-section -->