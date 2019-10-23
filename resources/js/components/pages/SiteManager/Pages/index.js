import React, { Component } from 'react';
import {Link} from 'react-router-dom';

import DatatablePage from '../../../atoms/DataTables';

export default class Pages extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/pages">Pages</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Pages</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Pages</Link>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                            
                            <DatatablePage/>
                                
                            </div>
                        </div>
                    </div> {/* <!-- .container-fluid --> */}
                </div> {/* <!-- #page-content --> */}
            </div>
        </>
    );
  }
}
