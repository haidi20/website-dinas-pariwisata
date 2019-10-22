import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class Password extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">
        
                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/">Home</Link>
                        </li>
                        <li>
                            <Link to="/sitemanager/change-password">Change Password</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>Change Password</h1>
                    </div>
                    
                    <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}>
                            Form Change Password
                        </div>
                        <div className="panel-body"> 
                            <div className="container-fluid">
                                <div className="row">
                                    <div className="col-md-12">

                                    <form>
                                        <div className="form-group">
                                            <label for="exampleInputPassword1">Password (Lama)</label>
                                            <input type="password" className="form-control" placeholder="Password" />
                                        </div>
                                        <div className="form-group">
                                            <label for="exampleInputPassword2">Password</label>
                                            <input type="password" className="form-control" placeholder="Password" />
                                        </div>
                                        <div className="form-group">
                                            <label for="exampleInputPassword3">Password (Konfirmasi)</label>
                                            <input type="password" className="form-control" placeholder="Password" />
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
