import React, {Component} from 'react'

// container
import SearchBig from './SearchBig';
import HeadingNews from './HeadingNews';
import MainBody from './MainBody';
import PostPopular from './PostPopular';

class Home extends Component {
    render(){
        return(
            <div>
                {/* <HeadingNews /> */}

                <section className="ticker-news">
                    <div className="container">
                        <div className="ticker-news-box">
                            <span className="breaking-news">breaking news</span>
                            <span className="new-news">New</span>
                            <ul id="js-news">
                                <li className="news-item"><span className="time-news">11:36 pm</span>  <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a> Donec odio. Quisque volutpat mattis eros... </li>
                                <li className="news-item"><span className="time-news">12:40 pm</span>  <a href="#">Dëshmitarja Abrashi: E kam parë Oliverin në turmë,</a> ndërsa neve na shpëtoi “çika Mille” </li>
                                <li className="news-item"><span className="time-news">11:36 pm</span>  <a href="#">Franca do të bashkëpunojë me Kosovën në fushën e shëndetësisë. </a></li>
                                <li className="news-item"><span className="time-news">01:00 am</span>  <a href="#">DioGuardi, kështu e mbrojti Kosovën në Washington, </a> para serbit Vejvoda </li>
                            </ul>
                        </div>
                    </div>
                </section>
                
                <SearchBig />
                
                <PostPopular />

                <MainBody />

            </div>
        )
    }
}

export default Home;