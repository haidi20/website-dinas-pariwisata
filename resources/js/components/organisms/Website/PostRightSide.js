import React, {Component} from 'react';

class PostRightSide extends Component {
    render(){
        return(
            <div className="col-sm-4">
                <div className="sidebar large-sidebar">

                    <div className="widget features-slide-widget">
                        <div className="title-section">
                            <h1><span>Postingan</span></h1>
                        </div>
                        <div className="image-post-slider">
                            <ul className="bxslider">
                                <li>
                                    <div className="news-post image-post2">
                                        <div className="post-gallery">
                                            <img src="images/pemerintah/POSTER BARU PARIWISATA-01.jpg" alt="" />
                                            <div className="hover-box">
                                                <div className="inner-hover">
                                                    <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                    <ul className="post-tags">
                                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div className="news-post image-post2">
                                        <div className="post-gallery">
                                            <img src="images/pemerintah/POSTER BARU PARIWISATA-02.jpg" alt="" />
                                            <div className="hover-box">
                                                <div className="inner-hover">
                                                    <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                    <ul className="post-tags">
                                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div className="news-post image-post2">
                                        <div className="post-gallery">
                                            <img src="images/pemerintah/POSTER BARU PARIWISATA-03.jpg" alt="" />
                                            <div className="hover-box">
                                                <div className="inner-hover">
                                                    <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                    <ul className="post-tags">
                                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>23</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <ul className="list-posts">

                            <li>
                                <img src="images/pemerintah/POSTER BARU PARIWISATA-04.jpg" alt="" />
                                <div className="post-content">
                                    <h2><a href="#">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <img src="images/pemerintah/POSTER BARU PARIWISATA-05.jpg" alt="" />
                                <div className="post-content">
                                    <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <img src="images/pemerintah/POSTER BARU PARIWISATA-06.jpg" alt="" />
                                <div className="post-content">
                                    <h2><a href="#">Sed arcu. Cras consequat.</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div className="widget tab-posts-widget">

                        <ul className="nav nav-tabs" id="myTab">
                            <li className="active">
                                <a href="#option1" data-toggle="tab">Popular</a>
                            </li>
                            <li>
                                <a href="#option2" data-toggle="tab">Recent</a>
                            </li>
                        </ul>

                        <div className="tab-content">
                            <div className="tab-pane active" id="option1">
                                <ul className="list-posts">
                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-01.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-02.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Sed arcu. Cras consequat. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-03.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-04.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-05.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div className="tab-pane" id="option2">
                                <ul className="list-posts">

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-06.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Phasellus ultrices nulla quis nibh. Quisque a lectus. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-08.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-09.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <img src="images/pemerintah/POSTER BARU PARIWISATA-10.jpg" alt="" />
                                        <div className="post-content">
                                            <h2><a href="#">Sed arcu. Cras consequat.</a></h2>
                                            <ul className="post-tags">
                                                <li><i className="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>										
                            </div>
                        </div>
                    </div>

                    

                    </div>
            </div>
        )
    }
}

export default PostRightSide;