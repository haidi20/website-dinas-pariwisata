import React, {Component} from 'react'
import bg from './logo-pariwisata-kaltim.png';

class SearchBig extends Component {
    render(){
        return(
            <div>
                <section className="space-search mantab" style={{backgroundImage:"url('images/logo-pariwisata-kaltim.png')" }}>
                {/* <section className="space-search keren" > */}
                    <div className="container center-search" >
                        <h2>Welcome To Kalimantan Timur</h2>
                        <h4>We offer a variety of services and options</h4>
                        <form role="search" className="search-form">
                            <input type="text" id="search" name="search" placeholder="what are you looking for?" />
                            <select class="category-search">
                                <option>All</option>
                                <option>Alam</option>
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