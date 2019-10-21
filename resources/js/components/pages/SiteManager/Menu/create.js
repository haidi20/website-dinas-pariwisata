import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CreateMenu extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">
                    
                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/menu">Menu</Link>
                        </li>
                        <li>
                            <Link to="/sitemanager/create">Create</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>Tambah</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="/sitemanager/menu" className="btn btn-default"><i className="fa fa-reply"></i> Kembali</Link>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">

                                <div className="panel panel-default">
                                    <div className="panel-heading">
                                        <h2>Form Menu</h2>
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
                                            <div className="form-group">
                                                <label htmlFor="link" className="control-label col-sm-2">Alamat Link</label>
                                                <div className="col-sm-8">
                                                    <input type="text" name="link" className="form-control" placeholder="masukkan link" />
                                                </div>
                                                <div className="col-sm-2">
                                                    <div className="custom-control custom-checkbox my-1 mr-sm-2">
                                                        <input type="checkbox" className="custom-control-input" id="customControlInline" /> &nbsp;
                                                        <label className="custom-control-label" htmlFor="customControlInline"><i className="fa fa-link"></i> &nbsp; Active Link</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div className="form-group">
                                                <label htmlFor="oder" className="control-label col-sm-2">Urutan</label>
                                                <div className="col-sm-4">
                                                    <input type="text" name="order" className="form-control" placeholder="masukkan nomor urut" />
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="status" className="control-label col-sm-2">Status</label>
                                                <div className="col-sm-10">
                                                    <div className="radio-inline icheck">
                                                        <input type="radio" name="status" value="1"/>
                                                        <label htmlFor="status_published" className="control-label col-sm-2">Published</label>
                                                    </div>
                                                    <div className="radio-inline icheck">
                                                        <input type="radio" name="status" value="0"/>
                                                        <label htmlFor="status_draft" className="control-label col-sm-2">Draft</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="panel-footer">
                                                <div className="row">
                                                    <div className="col-sm-11 col-sm-offset-1">
                                                        <Link to="/sitemanager/menu" className="btn-default btn">
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
