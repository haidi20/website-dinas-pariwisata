import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class User extends Component {
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
                            <Link to="/sitemanager/setting-user">Setting User</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>User Account</h1>
                    </div>
                    
                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">

                                <div className="alert alert-info">
                                    <p>WELCOME TO USER SETTING PAGE</p>
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
