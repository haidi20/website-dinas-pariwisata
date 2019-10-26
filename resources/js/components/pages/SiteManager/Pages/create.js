import React, { Component } from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';
import {baseURL} from '../Utils';
import CKEditor from 'ckeditor4-react';

export default class CreatePage extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                menu_id: '',
                title: '',
                read: '',
                content: ''
            },
            menus: [],
        }

        this._handleChange = this._handleChange.bind(this);
    }

    componentDidMount(){
        this.getMenus();
    }

    async getMenus(){
        let results = await axios.get(`${baseURL}/menus/select-menu`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let rows = [];
        results.data.map((row,key) => rows.push({
            id: row.id ,
            name: row.name,
        }));
        
        this.setState({
            menus:rows
        });
    }

    _handleChange(e){
        this.setState({
            data:{
                [e.target.name]:e.target.value
            }
        });
    }
    
    render() {
        return (
            <>
                <div className="static-content">
                    <div className="page-content">
                        
                        <ol className="breadcrumb">
                            <li>
                                <Link to="/sitemanager/post">Posts</Link>
                            </li>
                            <li>
                                <Link to="/sitemanager/create">Create</Link>
                            </li>
                        </ol>

                        <div className="page-heading">            
                            <h1>Tambah</h1>
                            <div className="options">
                                <div className="btn-toolbar">
                                    <Link to="/sitemanager/post" className="btn btn-default"><i className="fa fa-reply"></i> Kembali</Link>
                                </div>
                            </div>
                        </div>

                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-md-12">

                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <h2>Form Post</h2>
                                        </div>
                                        <div className="panel-body">
                                            <form className="form-horizontal">
                                                <div className="form-group">
                                                    <label htmlFor="namaMenu" className="control-label col-sm-2">judul</label>
                                                    <div className="col-sm-10">
                                                        <input type="text" name="title" value={this.state.data.title} onChange={this._handleChange} className="form-control" placeholder="masukkan judul artikel" required />
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="menu" className="control-label col-sm-2">Pilih Menu</label>
                                                    <div className="col-sm-10">
                                                        <select className="form-control" name="menu" value={this.state.data.menus_id} onChange={this._handleChange} id="positionMenu" required>
                                                            <option>----Pilih----</option>
                                                            {
                                                                this.state.menus.map(item => 
                                                                    <option 
                                                                        key={item.id}
                                                                        value={item.id}
                                                                    >{item.name}</option>    
                                                                )
                                                            }
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label htmlFor="namaImage" className="control-label col-sm-2">Konten</label>
                                                    <div className="col-sm-10">
                                                        <CKEditor
                                                            data={this.state.data.content}
                                                            onChange={this._handleChange}
                                                        />
                                                    </div>
                                                    
                                                </div>
                                                <div className="panel-footer">
                                                    <div className="row">
                                                        <div className="col-sm-11 col-sm-offset-1">
                                                            <Link to="/sitemanager/pages" className="btn-default btn">
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
