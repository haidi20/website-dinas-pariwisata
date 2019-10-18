import React, {lazy, Suspense} from 'react';

const Image = lazy(() => import('../../atoms/Image'));
function imageLoading(){
    const link = "https://i.pinimg.com/originals/f9/84/42/f984425b6ac113bfb4402ccca0168910.jpg"
    return(
        <img height="420" src={link} />
    )
}

export default function NewPostSlideHeader (props){
    return(
        <li>
            <div className="news-post image-post">

                <Suspense fallback={
                    imageLoading()
                }>
                    <Image src={props.src} />
                </Suspense>
                
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