import React, {lazy, Suspense} from 'react';

const Image = lazy(() => import('../../atoms/Image'));
function imageLoading(){
    const link = "https://i.pinimg.com/originals/f9/84/42/f984425b6ac113bfb4402ccca0168910.jpg"
    return(
        <img height="209" src={link}/>
    )
}

export default function NewPostHeading (props){
    const defSize = props.default ? 'default-size' : '';   

    return(
        <div className={`news-post image-post ${defSize}`}>

            <Suspense fallback={
                imageLoading()
            }>
                <Image src={props.src} />
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