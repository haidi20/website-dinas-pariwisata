import React, { Component } from 'react';
import {Link} from 'react-router-dom';

import DatatablePage from '../../../atoms/DataTables';
import ModalCategory from '../../../organisms/SiteManager/ModalCategory';

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
                                <a data-toggle="modal" data-target="#modalCategory" className="btn btn-default" style={{marginRight:5}}><i className="fa fa-tasks"></i> Kategori</a>
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Post</Link>
                            </div>
                        </div>
                    </div>

                    <div className="panel panel-default">
                    <div className="panel-heading" style={{fontWeight:'bold'}}></div>
                    <div className="panel-body"></div>
                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">

                                <DatatablePage />
                                <ModalCategory/>
                                
                            </div>
                        </div>
                    </div>
                    </div> {/* <!-- .container-fluid --> */}
                </div> {/* <!-- #page-content --> */}
            </div>
        </>
    );
  }
}
