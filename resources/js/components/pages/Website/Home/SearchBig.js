import React, {Component} from 'react'

class SearchBig extends Component {
    render(){
        return(
            <div>
                <section className="space-search">
                    <div className="container center-search" >
                        <h2>Welcome To Kalimantan Timur</h2>
                        <h4>We offer a variety of services and options</h4>
                        <form role="search" className="search-form">
                            <input type="text" id="search" name="search" placeholder="what are you looking for?" />
                            <button type="submit" id="search-submit"><i className="fa fa-search"></i></button>
                        </form>
                    </div>
                </section>
            </div>
        )
    }
}

export default SearchBig;