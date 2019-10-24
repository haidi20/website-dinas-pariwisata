import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CreateMedia extends Component {
    constructor(props){
        super(props);
        this.state = {
            name: '',
            link: ''
        }

        this._handleOnSubmit    = this._handleOnSubmit.bind(this);
        this._handleChange      = this._handleChange.bind(this);
    }

    _handleOnSubmit(){
        e.preventDefault();

        alert('onSubmit');
    }

    _handleChange(e){
        this.setState({
            [e.target.name] : e.target.value
        });
    }

    render() {
        let {name, link} = this.state;
        return (
            <>
                <div className="static-content">
                    <div className="page-content">
                        
                        <ol className="breadcrumb">
                            <li>
                                <Link to="/sitemanager/social-media">Social Media</Link>
                            </li>
                            <li>
                                <Link to="/sitemanager/social-media/create">Create</Link>
                            </li>
                        </ol>

                        <div className="page-heading">            
                            <h1>Tambah</h1>
                            <div className="options">
                                <div className="btn-toolbar">
                                    <Link to="/sitemanager/social-media" className="btn btn-default"><i className="fa fa-reply"></i> Kembali</Link>
                                </div>
                            </div>
                        </div>

                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-md-12">
                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <h2>Form Social Media</h2>
                                        </div>
                                        <div className="panel-body">
                                            <form className="form-horizontal" onSubmit={this._handleOnSubmit}>
                                                <div className="form-group">
                                                    <label htmlFor="namaMedia" className="control-label col-sm-2">Nama Social Media</label>
                                                    <div className="col-sm-8">
                                                        <input type="text" name="name" className="form-control" placeholder="masukkan nama sosial media" onChange={this._handleChange} value={name} required />
                                                        {/* {isNameFalse && <small className="form-text text-muted" style={{color:'red'}}>Nama Image harus lebih dari 6 karakter!</small>} */}
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="link" className="control-label col-sm-2">Link</label>
                                                    <div className="col-sm-8">
                                                        <input type="text" name="link" className="form-control" placeholder="masukkan link sosial media" onChange={this._handleChange} value={link} required />
                                                        {/* {isLinkFalse && <small className="form-text text-muted" style={{color:'red'}}>Nama Image harus lebih dari 6 karakter!</small>} */}
                                                    </div>
                                                </div>
                                                <div className="panel-footer">
                                                    <div className="row">
                                                        <div className="col-sm-11 col-sm-offset-1">
                                                            <Link to="/sitemanager/social-media" className="btn-default btn">
                                                                <i className="fa fa-reply"></i> Kembali
                                                            </Link>
                                                            <button className="btn-primary btn" type="submit" style={{marginLeft:5}}><i className="fa fa-save"></i> Simpan</button>
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
