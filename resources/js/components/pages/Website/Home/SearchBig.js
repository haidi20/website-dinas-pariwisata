import React, {Component} from 'react'

class SearchBig extends Component {
    render(){
        return(
            <div>
                <section className="space-search" style={{backgroundImage:"url('images/bg-search.png')" }}>
                {/* <section className="space-search keren" > */}
                    <div className="container center-search" >
                        <h2>Welcome To Kalimantan Timur</h2>
                        <h4>We offer a variety of services and options</h4>
                        <form role="search" className="search-form">
                            <input type="text" id="search" name="search" placeholder="what are you looking for?" />
                            {/* <select class="category-search">
                                <option>All</option>
                            </select> */}
                            <select class="category-search" name="" onchange="" onclick="return false;" id="">
                                <option value=""  >Semua Kategori </option>
                                <option value="1">Hutan</option>
                                <option value="2">Wisata</option>
                                <option value="3">Pantai</option>
                            </select>
                            <a className="btn">
                                <i className="fa fa-search"></i>
                            </a>
                        </form>
                    </div>
                </section>
            </div>
        )
    }
}

export default SearchBig;