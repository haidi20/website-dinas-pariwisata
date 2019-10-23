import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL} from '../Utils';

export default class CreateVideo extends Component {
    constructor(props){
        super(props);
        this.state = {
            name:'',
            link:'',
            isNameFalse: false,
            isLinkFalse: false,
        };

        this._handleChange = this._handleChange.bind(this);
        this._handleSubmit = this._handleSubmit.bind(this);
    }

    _handleChange(e) {
        this.setState({
            [e.target.name]: e.target.value
        }, () => {
            let {name, link} = this.state;

            if(name != ''){
                //validasi panjang karakter
                if(name.length < 6){
                    this.setState({isNameFalse:true});
                }else{
                    this.setState({isNameFalse:false});
                }
            }

            if(link != '' || link.includes('youtube.com/')){
                //validasi format link
                let re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
                if (!re.test(link)) { 
                    this.setState({isLinkFalse:true});
                }else{
                    this.setState({isLinkFalse:false});
                }
            }
        });
    }

    _handleOnSubmit(e){
        e.preventDefault();
        if(this.state.isLinkFalse == false && this.state.isNameFalse == false){
            let data = {
                name: this.state.name,
                type: 'video',
                link: this.state.link
            };
    
        axios.post(`${baseURL}/videos`,data)
            .then(res => {
                this.setState({
                    name:'',
                    link:'',
                    isNameFalse: false,
                    isLinkFalse: false,
                }, () =>{
                    alert("Video berhasil ditambahkan.");
                    this.props.history.push('/sitemanager/videos');
                });
            })
            .catch(function(err) {console.log(err)});
        }
    }

    render() {
        let {name, link, isLinkFalse, isNameFalse} = this.state;
        return (
            <>
                <div className="static-content">
                    <div className="page-content">
                        
                        <ol className="breadcrumb">
                            <li>
                                <Link to="/sitemanager/videos">Videos</Link>
                            </li>
                            <li>
                                <Link to="/sitemanager/videos/create">Create</Link>
                            </li>
                        </ol>

                        <div className="page-heading">            
                            <h1>Tambah</h1>
                            <div className="options">
                                <div className="btn-toolbar">
                                    <Link to="/sitemanager/videos" className="btn btn-default"><i className="fa fa-reply"></i> Kembali</Link>
                                </div>
                            </div>
                        </div>

                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-md-12">
                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <h2>Form Video</h2>
                                        </div>
                                        <div className="panel-body">
                                            <form className="form-horizontal" onSubmit={this._handleSubmit}>
                                                <div className="form-group">
                                                    <label htmlFor="namaVideo" className="control-label col-sm-2">Nama Video</label>
                                                    <div className="col-sm-8">
                                                        <input type="text" name="name" className="form-control" placeholder="masukkan nama vidoe" onChange={this._handleChange} value={name} required />
                                                        {isNameFalse && <small id="emailHelp" class="form-text text-muted" style={{color:'red'}}>Nama Video harus lebih dari 6 karakter!</small>}
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="link" className="control-label col-sm-2">Link</label>
                                                    <div className="col-sm-8">
                                                        <input type="text" name="link" className="form-control" placeholder="masukkan link video" onChange={this._handleChange} value={link} required />
                                                        {isLinkFalse && <small id="emailHelp" class="form-text text-muted" style={{color:'red'}}>Silahkan masukan Link yang benar!</small>}
                                                    </div>
                                                </div>
                                                <div className="panel-footer">
                                                    <div className="row">
                                                        <div className="col-sm-11 col-sm-offset-1">
                                                            <Link to="/sitemanager/videos" className="btn-default btn">
                                                                <i className="fa fa-reply"></i> Kembali
                                                            </Link>
                                                            <button className="btn-primary btn" type="submit" style={{marginLeft:5}} disabled={(isLinkFalse == false && isNameFalse == false) ? false : true}><i className="fa fa-save"></i> Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
