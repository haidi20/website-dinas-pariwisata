import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class CreateMenu extends Component {
    constructor(props){
        super(props);
        this.state = {
            name: '',
            color: '',
            parent_id: '',
            position: '',
            order: '',
            status: '',
        }

        this._handleChange = this._handleChange.bind(this);
    }

    _handleChange(e){
        this.setState({[e.target.name]:e.target.value});
    }
    
    render() {
        let {name,color,parent_id,position,order,status} = this.state;

        const selectOrder = []

        for(var i = 1; i <= 5; i++){
            selectOrder.push( 
            
                <option value={i}>{i}</option>
            
            )
        }

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
                                                    <label htmlFor="namaMenu" className="control-label col-sm-2">Nama</label>
                                                    <div className="col-sm-10">
                                                        <input type="text" name="name" value={name} onChange={this._handleChange} className="form-control" placeholder="masukkan nama menu" required />
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="color" className="control-label col-sm-2">Color</label>
                                                    <div className="col-sm-1">
                                                        <input className="form-control" type="color" name="color" value={color} onChange={this._handleChange} id="example-color-input" required />
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="position" className="control-label col-sm-2">Urutan</label>
                                                    <div className="col-sm-10">
                                                        <select className="form-control" name="position" value={position} onChange={this._handleChange} id="positionMenu" required>
                                                            <option>----Pilih----</option>
                                                            {
                                                                selectOrder
                                                            }
                                                        </select>
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
