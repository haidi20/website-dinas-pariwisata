import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CardImage extends Component {
    constructor(props){
        super(props);
    }

    render() {
        let {src, title, id} = this.props;
        return (
            <>
                <div className="col-sm-6 col-md-4 col-lg-3 mt-4" style={{marginBottom:35}}>
                    <div className="card" style={{width: "24rem"}}>
                        <a><img src={src} className="card-img-top" alt={src} style={{borderRadius:5}} width="240" height="240" data-toggle="modal" data-target={`#modal${id}`} /></a>
                        <div className="card-body" style={{textAlign:'center'}}>
                            <h5 className="card-title">{title.includes('.jpg')? title.replace('.jpg','') : title.includes('.png')? title.replace('.png','') : title.includes('.jpeg')? title.replace('.jpeg','') : ''}</h5>
                        </div>
                    </div>
                </div>

                {/* <!-- Creates the bootstrap modal where the image will appear --> */}
                <div className="modal fade" id={`modal${id}`} tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div className="modal-dialog">
                        <div className="modal-content">
                        <div className="modal-header">
                            <button type="button" className="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span className="sr-only">Close</span></button>
                            <h4 className="modal-title" id="myModalLabel">Image preview</h4>
                        </div>
                        <div className="modal-body">
                            <img src={src} id="imagepreview" style={{width: 610, height: 320}} />
                        </div>
                        <div className="modal-footer">
                            <div style={{textAlign:'center'}}>
                                <h5>{title.includes('.jpg')? title.replace('.jpg','') : title.includes('.png')? title.replace('.png','') : title.includes('.jpeg')? title.replace('.jpeg','') : ''}</h5>
                            </div>
                            <Link to={`/sitemanager/images/${id}`} type="button" className="btn btn-warning">Edit</Link>
                            <button type="button" className="btn btn-danger" data-dismiss="modal">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
