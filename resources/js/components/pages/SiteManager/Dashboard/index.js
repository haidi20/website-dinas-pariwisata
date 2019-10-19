import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class Dashboard extends Component {
  render() {
    return (
        <>
            <div class="static-content">
                <div class="page-content">
        
                    <ol class="breadcrumb">
                        <li>
                            <Link to="sitemanager">Home</Link>
                        </li>
                    </ol>

                    <div class="page-heading">            
                        <h1>Dashboard</h1>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="alert alert-info">
                                    <p>WELCOME TO DASHBOARD</p>
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
