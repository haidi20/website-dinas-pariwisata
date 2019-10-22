import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class BreakingNews extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/breaking-news">Breaking News</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Breaking News</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah News</Link>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                            
                            <div class="alert alert-info">
                                <p>WELCOME TO BREAKING NEWS PAGE</p>
                            </div>
                            {/* DataTables */}
                                
                            </div>
                        </div>
                    </div> {/* <!-- .container-fluid --> */}
                </div> {/* <!-- #page-content --> */}
            </div>
        </>
    );
  }
}
