import React, {Component, Suspense} from 'react';

import NewPostHeading from '../../../organisms/Website/NewPostHeader';
import NewPostSlideHeader from '../../../organisms/Website/NewPostSlideHeader';

class HeadingNews extends Component {
    constructor(props){
        super(props);
    }

    render(){
        const slideImage = []

        for(var i = 3; i<=5; i++){
            slideImage.push(
                <NewPostSlideHeader
                    key={i}
                    src={`images/pemerintah/POSTER BARU PARIWISATA-0${i}.jpg`} 
                />
            )
        }

        const imageHeader = []

        for(var j=2; j<9; j++){
            imageHeader.push(
                <NewPostHeading  
                    key={j}
                    src={`images/pemerintah/POSTER BARU PARIWISATA-0${j}.jpg`} 
                />
            )
        }
        return(
            <div>
                <section className="heading-news">
                    <div className="iso-call heading-news-box">

                        <NewPostHeading 
                            default={true}
                            src="images/pemerintah/POSTER BARU PARIWISATA-12.jpg" 
                        />

                        <div className="image-slider snd-size">
                            <span className="top-stories">TOP STORIES</span>
                            <ul className="bxslider">
                            {
                                slideImage
                            }
                            </ul>
                        </div>

                        {
                            imageHeader
                        }

                    </div>
                </section>
            </div>
        )
    }
}

export default HeadingNews;