import React, {Component, lazy, Suspense} from 'react';

// const SlideImage = lazy(() => import('../../../organisms/Website/SlideImage'));
const SlideImage = lazy(() => {
    return new Promise(resolve => {
      setTimeout(() => resolve(import('../../../organisms/Website/SlideImage')), 300);
    });
});

class HeadingNews extends Component {
    constructor(props){
        super(props);

        this.defaultImageSlide = this.defaultImageSlide.bind(this);
    }

    defaultImageSlide(){
        return (
            <li>
                <div className="news-post image-post">
                <img src={`images/pemerintah/POSTER BARU PARIWISATA-01}.jpg`} alt="" />
                    <div className="hover-box">
                        <div className="inner-hover">
                            <a className="category-post world" href="world.html">Business</a>
                            <h2><a href={'/image'}>Kosong </a></h2>
                            <ul className="post-tags">
                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                <li><i className="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                <li><i className="fa fa-eye"></i>872</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        )
    }

    render(){
        const images = []

        for(var i = 3; i<=5; i++){
            images.push(
                <li key={i}>
                    <div className="news-post image-post">
                        <SlideImage number={i} />
                        <div className="hover-box">
                            <div className="inner-hover">
                                <a className="category-post world" href="world.html">Business</a>
                                <h2><a href={'/image'}>Franca do të bashkëpunojë me Kosovën në ekonomi. </a></h2>
                                <ul className="post-tags">
                                    <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                    <li><i className="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                    <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    <li><i className="fa fa-eye"></i>872</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            )
        }
        return(
            <div>
                <section className="heading-news">
                    <div className="iso-call heading-news-box">

                    <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post default-size">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-01.jpg" alt="" /> */}
                            <SlideImage number={7} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post travel" href="travel.html">Travel</a>
                                    <h2><a href={'/image'}>Lorem ipsum dolor sit amet, consectetuer</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                    </Suspense>

                       <Suspense fallback={this.defaultImageSlide()}>
                            <div className="image-slider snd-size">
                                <span className="top-stories">TOP STORIES</span>
                                <ul className="bxslider">
                                {
                                    images
                                }
                                </ul>
                            </div>
                       </Suspense>

                       <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post default-size">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-01.jpg" alt="" /> */}
                            <SlideImage number={4} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post travel" href="travel.html">Travel</a>
                                    <h2><a href={'/image'}>Lorem ipsum dolor sit amet, consectetuer</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                    </Suspense>

                    <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post default-size">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-01.jpg" alt="" /> */}
                            <SlideImage number={2} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post travel" href="travel.html">Travel</a>
                                    <h2><a href={'/image'}>Lorem ipsum dolor sit amet, consectetuer</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                    </Suspense>

                    <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" /> */}
                            <SlideImage number={7} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post sport" href="sport.html">sport</a>
                                    <h2><a href={'/image'}>Donec odio. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                        </Suspense>

                        <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" /> */}
                            <SlideImage number={8} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post sport" href="sport.html">sport</a>
                                    <h2><a href={'/image'}>Donec odio. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                        </Suspense>

                        <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" /> */}
                            <SlideImage number={9} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post sport" href="sport.html">sport</a>
                                    <h2><a href={'/image'}>Donec odio. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                        </Suspense>

                        <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" /> */}
                            <SlideImage number={5} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post sport" href="sport.html">sport</a>
                                    <h2><a href={'/image'}>Donec odio. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                        </Suspense>

                        <Suspense fallback={this.defaultImageSlide()}>
                        <div className="news-post image-post">
                            {/* <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" /> */}
                            <SlideImage number={5} />
                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post sport" href="sport.html">sport</a>
                                    <h2><a href={'/image'}>Donec odio. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                    </ul>
                                    <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                                </div>
                            </div>
                        </div>
                        </Suspense>

                    </div>
                </section>
            </div>
        )
    }
}

export default HeadingNews;