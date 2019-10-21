import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CardImage extends Component {
    constructor(props){
        super(props);
    }

    render() {
        let {src, title} = this.props;
        return (
            <>
                <div className="col-sm-6 col-md-4 col-lg-3 mt-4" style={{marginBottom:35}}>
                    <div className="card" style={{width: "18rem"}}>
                        <img src={src} className="card-img-top" alt={src} style={{borderRadius:5}}/>
                        <div className="card-body" style={{textAlign:'center'}}>
                            <h5 className="card-title">{title}</h5>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
