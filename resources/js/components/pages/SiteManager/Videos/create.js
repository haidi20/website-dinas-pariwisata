import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CreateVideo extends Component {
  render() {
    return (
      <>
        <div className="static-content">
            <div className="page-content">
                
                <ol className="breadcrumb">
                    <li>
                        <Link to="/sitemanager/videos">Videos</Link>
                    </li>
                    <li>
                        <Link to="/sitemanager/videoscreate">Create</Link>
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
                                    <h2>Form Videos</h2>
                                </div>
                                <div className="panel-body">
                                    <form className="form-horizontal">
                                        <div className="form-group">
                                            <label htmlFor="namaMenu" className="control-label col-sm-2">Nama Menu</label>
                                            <div className="col-sm-10">
                                                <input type="text" name="name" className="form-control" placeholder="masukkan nama menu" />
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <label htmlFor="caption" className="control-label col-sm-2">Caption</label>
                                            <div className="col-sm-10">
                                                <input type="text" name="caption" className="form-control" placeholder="masukkan caption menu" />
                                            </div>
                                        </div>
                                        <div className="panel-footer">
                                            <div className="row">
                                                <div className="col-sm-11 col-sm-offset-1">
                                                    <Link to="/sitemanager/videos" className="btn-default btn">
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
