import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL, root} from '../Utils';

export default class EditImage extends Component {
    constructor(props) {
        super(props);

        this.state = {
            name: '',
            fileName:'',
            isNameFalse: false,
            file: null,
            badFormat: false
        };

        this._handleImageChange = this._handleImageChange.bind(this);
        this._handleSubmit = this._handleSubmit.bind(this);
        this._handleChange = this._handleChange.bind(this);
    }

    _handleImageChange(e){
        e.preventDefault();
        const types = ['image/png', 'image/jpeg', 'image/jpg', 'image/PNG'];
        let file = e.target.files[0];

        if (types.every(type => file.type !== type)) {
            this.setState({badFormat: true});
        }
        if (file.size > 150000) {
            this.setState({badFormat: true});
        }
        if(this.state.badFormat === false){
            this.setState({file, fileName:''});
        }
    }

    _handleChange(e){
        e.preventDefault();
        // this.setState({name: e.target.value}, () => {
        //     if(this.state.name != ''){
        //         //validasi panjang karakter
        //         if(this.state.name.length < 6){
        //             this.setState({isNameFalse:true});
        //         }else{
        //             this.setState({isNameFalse:false});
        //         }
        //     }
        // });
    }

    _handleSubmit(e){
        e.preventDefault();
        
        // if(this.state.isNameFalse === false){
            let bodyFormData = new FormData();
            // bodyFormData.append('name', this.state.name);
            bodyFormData.append('image', this.state.file);
            bodyFormData.append('type', 'image');
            bodyFormData.append('_method', 'PATCH');

            console.log(`${baseURL}/images/${this.props.match.params.id}`)
            
            axios({
                method: 'post',
                url: `${baseURL}/images/${this.props.match.params.id}`,
                data: bodyFormData,
                config: { headers: {'Content-Type': 'multipart/form-data' }}
            })
            .then(res => {
                this.setState({
                    name: '',
                    file: null,
                    isNameFalse: false
                }, () => {
                    alert('Image berhasil diedit!');
                    this.props.history.push('/sitemanager/images');
                });
            })
            .catch(err => {
                console.log('error = ',err);
            });
        // }
    }

    componentDidMount(){
        this.getData();
    }

    async getData(){
        let result = await axios.get(`${baseURL}/images/${this.props.match.params.id}`)
                                    .then(res => res.data.data)
                                    .catch(err => console.log(err));
        let name = result.name.includes('.jpg')? result.name.replace('.jpg','') : result.name.includes('.png')? result.name.replace('.png','') : result.name.includes('.jpeg')? result.name.replace('.jpeg','') : '';
        this.setState({
            name,
            fileName: result.name
        });

        console.log(this.state)
    }

    render() {
        let {badFormat, name, isNameFalse} = this.state;
        return (
            <div className="static-content">
                <div className="page-content">
                    
                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/images">Images</Link>
                        </li>
                        <li>
                            <Link to={`/sitemanager/images/edit/${this.props.match.params.id}`}>Edit</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>Edit Image</h1>
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
                                        <form className="form-horizontal" onSubmit={this._handleSubmit}>
                                            <div className="form-group">
                                                {/* <label htmlFor="namaImage" className="control-label col-sm-2">Nama Image</label> */}
                                                <div className="col-sm-8">
                                                    {/* <input type="text" name="name" className="form-control" placeholder="masukkan nama image" required onChange={this._handleChange} value={name} />
                                                    {isNameFalse && <small id="emailHelp" className="form-text text-muted" style={{color:'red'}}>Nama Image harus lebih dari 6 karakter!</small>} */}
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label htmlFor="namaImage" className="control-label col-sm-2">Choose Image</label>
                                                <div className="col-sm-8">
                                                    {this.state.fileName && <img src={`${root}/images/${this.state.fileName}`} width="160" height="100" style={{marginBottom:5}} />}
                                                    <div className="custom-file">
                                                        <input type="file" src={`${root}/images/${this.state.fileName}`} name="image" className="custom-file-input" onChange={this._handleImageChange} />
                                                        {badFormat && <small id="image" className="form-text text-muted" style={{color:'red'}}>Ukuran Image maksimal <b>150MB</b> dan format harus <b>jpg, png dan jpeg!</b></small>}
                                                    </div>
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
