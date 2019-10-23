import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CreateImage extends Component {
  render() {
    return (
        <div className="static-content">
            <div className="page-content">
                
                <ol className="breadcrumb">
                    <li>
                        <Link to="/sitemanager/images">Images</Link>
                    </li>
                    <li>
                        <Link to="/sitemanager/images/create">Create</Link>
                    </li>
                </ol>

                <div className="page-heading">            
                    <h1>Tambah</h1>
                    <div className="options">
                        <div className="btn-toolbar">
                            <Link to="/sitemanager/images" className="btn btn-default"><i className="fa fa-reply"></i> Kembali</Link>
                        </div>
                    </div>
                </div>

                <div className="container-fluid">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="panel panel-default">
                                <div className="panel-heading">
                                    <h2>Form Image</h2>
                                </div>
                                <div className="panel-body">
                                    <form className="form-horizontal">
                                        <div className="form-group">
                                            <label htmlFor="namaImage" className="control-label col-sm-2">Nama Image</label>
                                            <div className="col-sm-8">
                                                <input type="text" name="name" className="form-control" placeholder="masukkan nama vidoe" required />
                                                {/* {isNameFalse && <small id="emailHelp" class="form-text text-muted" style={{color:'red'}}>Nama Video harus lebih dari 6 karakter!</small>} */}
                                            </div>
                                        </div>
                                        <div className="panel-footer">
                                            <div className="row">
                                                <div className="col-sm-11 col-sm-offset-1">
                                                    <Link to="/sitemanager/images" className="btn-default btn">
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
    );
  }
}
