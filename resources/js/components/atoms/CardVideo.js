import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CardVideo extends Component {
    constructor(props){
        super(props);
    }

    render() {
        let {src, title, id} = this.props;
        let url = src.replace("watch?v=", "embed/");
        return (
            <>
                {/* <!-- Grid column --> */}
                <div className="col-sm-6 col-md-4 col-lg-4 mt-4" style={{marginBottom:35}}>
                    <div className="card" style={{width: "30rem"}}>

                    {/* <!--Modal: Name--> */}
                    <div className="modal fade" id={`modal${id}`} tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div className="modal-dialog modal-lg" role="document">

                            {/* <!--Content--> */}
                            <div className="modal-content">

                                {/* <!--Body--> */}
                                <div className="modal-body mb-0 p-0">

                                    <div className="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                    <iframe className="embed-responsive-item" src={url}
                                        allowFullScreen></iframe>
                                    </div>

                                </div>

                                {/* <!--Footer--> */}
                                <div className="modal-footer justify-content-center">
                                    <span className="mr-8" style={{marginRight:30, fontSize:20, fontWeight:'bold'}}>{title}</span>
                                    <Link to="#" className="btn btn-warning btn-rounded btn-md ml-4">Edit</Link>
                                    <Link to="#" className="btn btn-danger btn-rounded btn-md ml-4">Delete</Link>
                                </div>
                            </div>
                            {/* <!--/.Content--> */}

                        </div>
                    </div>
                    {/* <!--Modal: Name--> */}

                    <div className="col-sm-6 col-md-4 col-lg-4 mt-4">
                        <div className="card" style={{width: "30rem"}}>
                            <div className="card-body">
                                <a><img className="img-fluid z-depth-1" src={`https://img.youtube.com/vi/${url.split('/')[4]}/hqdefault.jpg`} alt="video" data-toggle="modal" data-target={`#modal${id}`} width="300" height="240" /></a>
                                <h5 className="card-title" style={{textAlign:'center'}}>{`${title.slice(0,40)}...`}</h5>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                {/* <!-- Grid column --> */}
            </>
        );
    }
}
