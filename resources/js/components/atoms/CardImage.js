import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL} from '../../components/pages/SiteManager/Utils';

export default class CardImage extends Component {
    constructor(props){
        super(props);
    }

    _onDelete(id){
        let del = confirm("Apakah anda yakin ?");
        if(del){
            let bodyFormData = new FormData();
            bodyFormData.append('_method', 'DELETE');
            
            axios({
                method: 'post',
                url: `${baseURL}/images/${id}`,
                data: bodyFormData,
                config: { headers: {'Content-Type': 'multipart/form-data' }}
            })
            .then(res => {
                let val = res.data;
                alert(`Image ${val.data.name} telah terhapus`);
                this.props._onDelete(id);
            })
            .catch(err => console.log(err));
        }
    }

    render() {
        let {src, title, id} = this.props;
        let newTitle = title.includes('pemerintah/') ? title.replace('pemerintah/','') : title;
        return (
            <>
                <div className="col-sm-6 col-md-4 col-lg-3 mt-4" style={{marginBottom:35}}>
                    <div className="card" style={{width: "24rem"}}>
                        <a><img src={src} className="card-img-top" alt={src} style={{borderRadius:5}} width="240" height="240" data-toggle="modal" data-target={`#modal${id}`} /></a>
                        {/* <div className="card-body" style={{textAlign:'center'}}>
                            <h5 className="card-title">{newTitle.includes('.jpg')? newTitle.replace('.jpg','') : newTitle.includes('.png')? newTitle.replace('.png','') : newTitle.includes('.jpeg')? newTitle.replace('.jpeg','') : ''}</h5>
                        </div> */}
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
                                <h5>{newTitle.includes('.jpg')? newTitle.replace('.jpg','') : newTitle.includes('.png')? newTitle.replace('.png','') : newTitle.includes('.jpeg')? newTitle.replace('.jpeg','') : ''}</h5>
                            </div>
                            <Link to={`/sitemanager/images/${id}`} type="button" className="btn btn-warning">Edit</Link>
                            <button type="button" className="btn btn-danger" onClick={() => this._onDelete(id)}>Delete</button>
                        </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
