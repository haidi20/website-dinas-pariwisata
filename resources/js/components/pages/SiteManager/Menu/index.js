import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import DatatablePage from '../../../atoms/DataTables';


require('react-jquery-datatables/css/datatables.min.css')

export default class Menu extends Component {

  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/menu">Menu</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Menu</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="/sitemanager/menu/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Menu</Link>
                            </div>
                        </div>
                    </div>


                    <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}></div>
                        <div className="panel-body"></div>
                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-md-12">
                                
                                {/* <div class="alert alert-info">
                                    <p>WELCOME TO MENU PAGE</p>
                                </div> */}
                                <DatatablePage />
                                
                                

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
