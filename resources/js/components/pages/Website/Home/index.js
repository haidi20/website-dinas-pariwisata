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
                <HeadingNews />

                <section class="ticker-news">
                    <div class="container">
                        <div class="ticker-news-box">
                            <span class="breaking-news">breaking news</span>
                            <span class="new-news">New</span>
                            <ul id="js-news">
                                <li class="news-item"><span class="time-news">11:36 pm</span>  <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a> Donec odio. Quisque volutpat mattis eros... </li>
                                <li class="news-item"><span class="time-news">12:40 pm</span>  <a href="#">Dëshmitarja Abrashi: E kam parë Oliverin në turmë,</a> ndërsa neve na shpëtoi “çika Mille” </li>
                                <li class="news-item"><span class="time-news">11:36 pm</span>  <a href="#">Franca do të bashkëpunojë me Kosovën në fushën e shëndetësisë. </a></li>
                                <li class="news-item"><span class="time-news">01:00 am</span>  <a href="#">DioGuardi, kështu e mbrojti Kosovën në Washington, </a> para serbit Vejvoda </li>
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