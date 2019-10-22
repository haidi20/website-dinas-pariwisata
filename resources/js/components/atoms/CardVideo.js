import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CardVideo extends Component {
    constructor(props){
        super(props);
    }

    render() {
        let {src, title} = this.props;
        return (
            <>
                <div className="col-sm-6 col-md-4 col-lg-3 mt-4" style={{margin:30}}>
                    <div className="card" style={{width: "18rem"}}>
                        <video width="300" height="240" controls>
                            <source src={src} type="video/mp4" />
                            Your browser does not support the video tag.
                        </video>
                        <div className="card-body" style={{textAlign:'center'}}>
                            <h5 className="card-title">{title}</h5>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
