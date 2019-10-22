import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class SocialMedia extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">
        
                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/social-media">Social Media</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>Social Media</h1>
                    </div>
                    
                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">

                                <div className="alert alert-info">
                                    <p>WELCOME TO SOCIAL MEDIA PAGE</p>
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
