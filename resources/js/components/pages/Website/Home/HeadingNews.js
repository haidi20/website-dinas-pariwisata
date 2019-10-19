import React, {Component, Suspense} from 'react';

import PostHeader from '../../../organisms/Website/PostHeader';
import PostSlideHeader from '../../../organisms/Website/PostSlideHeader';

class HeadingNews extends Component {
    constructor(props){
        super(props);
    }

    render(){
        const postSlideHeader = []

        for(var i = 3; i<=5; i++){
            postSlideHeader.push(
                <PostSlideHeader
                    key={i}
                    src={`images/pemerintah/POSTER BARU PARIWISATA-0${i}.jpg`} 
                />
            )
        }

        const postHeader = []

        for(var j=2; j<9; j++){
            postHeader.push(
                <PostHeader  
                    key={j}
                    src={`images/pemerintah/POSTER BARU PARIWISATA-0${j}.jpg`} 
                />
            )
        }
        return(
            <div>
                <section className="heading-news">
                    <div className="iso-call heading-news-box">

                        <PostHeader 
                            default={true}
                            src="images/pemerintah/POSTER BARU PARIWISATA-12.jpg" 
                        />

                        <div className="image-slider snd-size">
                            <span className="top-stories">TOP STORIES</span>
                            <ul className="bxslider">
                            {
                                postSlideHeader
                            }
                            </ul>
                        </div>

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