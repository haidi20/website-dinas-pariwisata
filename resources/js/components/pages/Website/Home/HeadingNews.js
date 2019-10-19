import React, {Component, Suspense} from 'react';

// import PostHeader from '../../../organisms/Website/PostHeader';
// import PostSlideHeader from '../../../organisms/Website/PostSlideHeader';

const Image = React.lazy(() => {
    const x = new Promise((resolve) => {
      setTimeout(() => {
        return resolve(import("../../../atoms/Image"))
      }, 5500)
    })
    return x;
});

const sizeImagePostHeader = 200;

class HeadingNews extends Component {
    constructor(props){
        super(props);
    }

    componentDidCatch(error, errorInfo) {
        console.log('ERROR = ', error, errorInfo);
    }

    render(){
        function imageLoadingPostSlideHeader(){
            // const link = "https://i.pinimg.com/originals/f9/84/42/f984425b6ac113bfb4402ccca0168910.jpg"
            const link = "images/loading.jpg";
            return(
                <img height="400" src={link} />
            )
        }

        function imageLoadingPostHeader(){
            // const link = "https://i.pinimg.com/originals/f9/84/42/f984425b6ac113bfb4402ccca0168910.jpg"
            const link = "images/loading.jpg";
            return(
                // <img height="209" src={link}/>
                <img height={sizeImagePostHeader} src={link}/>
            )
        }

        const postSlideHeader = []

        for(var i = 3; i<=5; i++){
            postSlideHeader.push(
                <li>
                    <div className="news-post image-post" key={i}>

                        <Suspense fallback={
                            imageLoadingPostSlideHeader()
                        }>
                            <Image 
                                src={`images/pemerintah/POSTER BARU PARIWISATA-0${i}.jpg`} 
                            />
                        </Suspense>

                        {/* <img src={props.src} /> */}
                        
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

        const postHeader = []

        for(var j=2; j<9; j++){
            postHeader.push(
                <div className={`news-post image-post`} key={j}>

                    <Suspense fallback={
                        imageLoadingPostHeader()
                    }>
                        <Image 
                            src={`images/pemerintah/POSTER BARU PARIWISATA-0${j}.jpg`}  
                            height={sizeImagePostHeader}
                        />
                    </Suspense>

                    {/* <img src={props.src} /> */}

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
            )
        }

        return(
            <div>
                <section className="heading-news">
                    <div className="iso-call heading-news-box">

                        <div className={`news-post image-post default-size`}>

                            <Suspense fallback={
                                imageLoadingPostHeader()
                            }>
                                <Image 
                                    src={`images/pemerintah/POSTER BARU PARIWISATA-0${j}.jpg`}  
                                />
                            </Suspense>

                            {/* <img src={props.src} /> */}

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

                        {/* <div className="image-slider snd-size">
                            <span className="top-stories">TOP STORIES</span>
                            <ul className="bxslider">
                            {
                                postSlideHeader
                            }
                            </ul>
                        </div> */}

                        {
                            postHeader
                        }

                    </div>
                </section>
            </div>
        )
    }
}

export default HeadingNews;