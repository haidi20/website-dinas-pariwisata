import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class Posts extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/post">Post</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Post</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <a data-toggle="modal" href="#category" className="btn btn-default" style={{marginRight:5}}><i className="fa fa-tasks"></i> Kategori</a>
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Post</Link>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                            
                            <div className="alert alert-info">
                                <p>WELCOME TO POST PAGE</p>
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
