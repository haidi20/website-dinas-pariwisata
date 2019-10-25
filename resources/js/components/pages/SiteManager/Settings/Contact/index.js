import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import CKEditor from 'ckeditor4-react';

export default class Contact extends Component {
    constructor(props){
        super(props);
        this.state = {
            address: '',
            phone: '',
            fax: '',
            email: '',
            time: ''
        };

        this._handleChange = this._handleChange.bind(this);
    }

    _handleChange(e){
        this.setState({[e.target.name]: e.target.value});
    }

    render() {
        let {address,phone,fax,email,time} = this.state;
        return (
            <>
                <div className="static-content">
                    <div className="page-content">
            
                        <ol className="breadcrumb">
                            <li>
                                <Link to="/sitemanager/">Home</Link>
                            </li>
                            <li>
                                <Link to="/sitemanager/setting-contact">Setting</Link>
                            </li>
                            <li>
                                <Link to="/sitemanager/setting-contact">Contact</Link>
                            </li>
                        </ol>

                        <div className="page-heading">            
                            <h1>Contact</h1>
                        </div>
                        
                        <div className="panel panel-default">
                            <div className="panel-heading" style={{fontWeight:'bold'}}>
                                Contact
                            </div>
                            <div className="panel-body"> 
                                <div className="container-fluid">
                                    <div className="row">
                                        <div className="col-md-12">

                                        <form>
                                            <div class="form-group">
                                                <label for="comment" style={{fontWeight:'bold'}}>Address</label>
                                                <CKEditor
                                                    data={address}
                                                    onChange={this._handleChange}
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" style={{fontWeight:'bold'}}>Phone</label>
                                                <CKEditor
                                                    data={phone}
                                                    onChange={this._handleChange}
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" style={{fontWeight:'bold'}}>Fax</label>
                                                <CKEditor
                                                    data={fax}
                                                    onChange={this._handleChange}
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" style={{fontWeight:'bold'}}>Email</label>
                                                <CKEditor
                                                    data={email}
                                                    onChange={this._handleChange}
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" style={{fontWeight:'bold'}}>Time</label>
                                                <CKEditor
                                                    data={time}
                                                    onChange={this._handleChange}
                                                />
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i className="fa fa-save"></i> Simpan</button>
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
