import React, {Component, Suspense} from 'react';

// function retry(fn, retriesLeft = 5, interval = 1000) {
//     return new Promise((resolve, reject) => {
//       fn()
//         .then(resolve)
//         .catch((error) => {
//           setTimeout(() => {
//             if (retriesLeft === 1) {
//               // reject('maximum retries exceeded');
//               reject(error);
//               return;
//             }
  
//             // Passing on "reject" is the important part
//             retry(fn, retriesLeft - 1, interval).then(resolve, reject);
//           }, interval);
//         });
//     });
//   }
  

// const Image = React.lazy(() => retry(() => {
//     const x = new Promise((resolve) => {
//       setTimeout(() => {
//         return resolve(import("../../atoms/Image"))
//       }, 1000)
//     })
//     return x;
// }));

const sizeImagePostHeader = 210;

export default class PostHeader extends Component {
    constructor(props){
        super(props);

        this.state = {
            posts: this.props.posts
        }
    }

    componentDidCatch(error, errorInfo) {
        console.log('ERROR = ', error, errorInfo);
    }

    componentDidMount(){
        console.log(this.state.posts);
    }

    render(){
        function imageLoadingPostSlideHeader(){
            const link = "images/loading.jpg";
            return(
                <img height="400" src={link} />
            )
        }

        function imageLoadingPostHeader(){
            const link = "images/loading.jpg";
            return(
                // <img height="209" src={link}/>
                <img height={sizeImagePostHeader} src={link}/>
            )
        }

        const postSlideHeader = []

        for(var i = 3; i<=5; i++){
            postSlideHeader.push(
                <li key={i}>
                    <div className="news-post image-post" key={i}>

                        {/* <Suspense fallback={
                            imageLoadingPostSlideHeader()
                        }>
                            <Image 
                                src="images/pemerintah/POSTER BARU PARIWISATA-05.jpg"
                            />
                        </Suspense> */}

                        <img 
                            src={`images/pemerintah/POSTER BARU PARIWISATA-0${i}.jpg`}
                        />
                        
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

                    {/* <Suspense fallback={
                        imageLoadingPostHeader()
                    }>
                        <Image 
                            src="images/pemerintah/POSTER BARU PARIWISATA-06.jpg"  
                            height={sizeImagePostHeader}
                        />
                    </Suspense> */}

                    <img 
                        src={`images/pemerintah/POSTER BARU PARIWISATA-0${j}.jpg`} 
                        // height={sizeImagePostHeader}
                    />

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

        
    }
}