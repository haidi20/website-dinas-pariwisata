import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL} from '../pages/SiteManager/Utils';

export default class CardVideo extends Component {
    constructor(props){
        super(props);
    }

    _onDelete(id){
        let del = confirm("Apakah anda yakin ?");
        if(del){
            axios.delete(`${baseURL}/videos/${id}`)
            .then(res => {
                let val = res.data;
                alert(`Video ${val.data.name} telah terhapus`);
                this.props._onDelete(id);
            })
            .catch(err => console.log(err));
        }
    }

    _onClose(){
        console.log("Close jalan!");
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
                                <div className="modal-header justify-content-center">
                                    <button type="button" className="close" data-dismiss="modal" aria-label="Close" onClick={this._onClose}>
                                        <span aria-hidden="true" style={{fontSize:35}}>&times;</span>
                                    </button>
                                </div>
                                {/* <!--Body--> */}
                                <div className="modal-body mb-0 p-0">
                                    <div className="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                        <iframe className="embed-responsive-item" id="video" src={url} allowFullScreen></iframe>
                                    </div>
                                </div>

                                {/* <!--Footer--> */}
                                <div className="modal-footer justify-content-center">
                                    <div style={{textAlign:'center'}}>
                                        <h5 className="mr-8" style={{marginRight:30, fontSize:16, fontWeight:'bold'}}>{title}</h5>
                                    </div>
                                    <Link to={`/sitemanager/videos/${id}`} className="btn btn-warning btn-md ml-4">Edit</Link>
                                    <button className="btn btn-danger btn-md ml-4" onClick={() => this._onDelete(id)}>Delete</button>
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
                                <div style={{textAlign:'center'}}>
                                    <h5 className="card-title">{`${title.length < 40 ? title : title.slice(0,40)+"..."}`}</h5>
                                </div>
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
