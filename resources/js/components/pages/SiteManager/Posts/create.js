import React, { Component } from 'react';
import axios from 'axios';
import {Link} from 'react-router-dom';
import {baseURL} from '../Utils';
import CKEditor from 'ckeditor4-react';

export default class CreatePost extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                category_id: '',
                title: '',
                read: '',
                created_at: '',
                konten: ''
            },
            categories: [],
            badFormat: ''
        }

        this._handleChange = this._handleChange.bind(this);
    }

    componentDidMount(){
        this.getCategory();
    }

    async getCategory(){
        let results = await axios.get(`${baseURL}/categories`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let rows = [];
        results.data.map((row,key) => rows.push({
            id: row.id ,
            name: row.name,
        }));
        
        this.setState({
            categories:rows
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
                                                    <label htmlFor="position" className="control-label col-sm-2">Urutan</label>
                                                    <div className="col-sm-10">
                                                        <select className="form-control" name="position" value={this.state.data.category_id} onChange={this._handleChange} id="positionMenu" required>
                                                            <option>----Pilih----</option>
                                                            {
                                                                this.state.categories.map(item => 
                                                                    <option 
                                                                        key={item.id}
                                                                        value={item.id}
                                                                    >{item.name}</option>    
                                                                )
                                                            }
                                                        </select>
                                                    </div>
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="namaImage" className="control-label col-sm-2">Pilih Gambar</label>
                                                    <div className="col-sm-8">
                                                        <div className="custom-file">
                                                            <input type="file" name="image" className="custom-file-input" onChange={this._handleImageChange} required />
                                                            {this.state.badFormat && <small id="image" className="form-text text-muted" style={{color:'red'}}>Ukuran Image maksimal <b>150MB</b> dan format harus <b>jpg, png dan jpeg!</b></small>}
                                                        </div>
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
