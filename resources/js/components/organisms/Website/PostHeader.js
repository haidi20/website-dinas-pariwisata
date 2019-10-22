import React, {Component, lazy, Suspense} from 'react';
import {connect} from 'react-redux';

function retry(fn, retriesLeft = 5, interval = 1000) {
    return new Promise((resolve, reject) => {
      fn()
        .then(resolve)
        .catch((error) => {
          setTimeout(() => {
            if (retriesLeft === 1) {
              // reject('maximum retries exceeded');
              reject(error);
              return;
            }
  
            // Passing on "reject" is the important part
            retry(fn, retriesLeft - 1, interval).then(resolve, reject);
          }, interval);
        });
    });
  }
  

const Image = lazy(() => retry(() => {
    const x = new Promise((resolve) => {
      setTimeout(() => {
        return resolve(import("../../atoms/Image"))
      }, 1000)
    })
    return x;
}));

class PostHeader extends Component{
    constructor(){
        super()

        this.state = {
            firstPost:{},
            postsLimitSix:[],
            postsLimitThree:[],
        }

        this.imageLoading = this.imageLoading.bind(this);
        this.postSlideHeader = this.postSlideHeader.bind(this);
        this.imageLoadingSlide = this.imageLoadingSlide.bind(this);
    }

    imageLoadingSlide(){
        const link = "images/loading.jpg";
        return(
            <img height="400" src={link} />
        )
    }

    imageLoading(){
        const link = "images/loading.jpg";
        return(
            <img height="209" src={link} />
        )
    }

    async componentDidMount(){
        const data = await this.props.posts;

        this.setState({
            firstPost: data.firstPost,
            postsLimitSix: data.postsLimitSix,
            postsLimitThree: data.postsLimitThree,
        })
    }

    postHeader(){
        const {postsLimitSix} = this.state
        const result = postsLimitSix.map((post, index) =>
            <div className={`news-post image-post`} key={index}>
                    <Suspense fallback={
                        this.imageLoading()
                    }>
                        <Image 
                            src="images/pemerintah/POSTER BARU PARIWISATA-07.jpg"
                        />
                    </Suspense>


                <div className="hover-box">
                    <div className="inner-hover">
                        <a className="category-post travel" href="travel.html">Travel</a>
                        <h2><a href={'/image'}>{post.title}</a></h2>
                        <ul className="post-tags">
                            <li><i className="fa fa-clock-o"></i><span>{post.created_at}</span></li>
                            <li><a href="#"><i className="fa fa-comments-o"></i><span>{post.read}</span></a></li>
                        </ul>
                        <p>{post.content}</p>
                    </div>
                </div>
            </div>    
        )

        return result;
    }

    postSlideHeader(){
        const {postsLimitThree} = this.state

        const result = postsLimitThree.map((post, i) =>
            <li key={i}>
                <div className="news-post image-post">

                    <Suspense fallback={
                        this.imageLoading()
                    }>
                        <Image 
                            src="images/pemerintah/POSTER BARU PARIWISATA-11.jpg"
                        />
                    </Suspense>


                    {/* <img 
                        src={`images/pemerintah/POSTER BARU PARIWISATA-11.jpg`}
                    /> */}
                    
                    <div className="hover-box">
                        <div className="inner-hover">
                            <a className="category-post world" href="world.html">Business</a>
                            <h2><a href={'/image'}>judul</a></h2>
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

        return result;
    }

    

    render(){
        const {firstPost, postsLimitThree, postsLimitSix} = this.state

        console.log(postsLimitThree, postsLimitSix)

        return(
            <div>
                <section className="heading-news">
                    <div className="iso-call heading-news-box">

                        <div className={`news-post image-post default-size`}>
                            <img 
                                src="images/pemerintah/POSTER BARU PARIWISATA-08.jpg" 
                                // height={sizeImagePostHeader}
                            />

                            <div className="hover-box">
                                <div className="inner-hover">
                                    <a className="category-post travel" href="travel.html">Travel</a>
                                    <h2><a href={'/image'}>{firstPost.title}</a></h2>
                                    <ul className="post-tags">
                                        <li><i className="fa fa-clock-o"></i><span>{firstPost.created_at}</span></li>
                                        <li><a href="#"><i className="fa fa-comments-o"></i><span>{firstPost.read}</span></a></li>
                                    </ul>
                                    <p>{firstPost.content}</p>
                                </div>
                            </div>
                        </div> 
    
                        <div className="image-slider snd-size">
                            {/* <span className="top-stories">TOP STORIES</span> */}
                            <ul className="bxslider">
                            {
                                this.postSlideHeader()
                            }
                            </ul>
                        </div>
    
                        {
                            this.postHeader()
                        }
    
                    </div>
                </section>
            </div>
        )
    }
}

const mapStateToProps = state => {
    return {
      posts : state.postReducer
    }
}

export default connect(mapStateToProps)(PostHeader);