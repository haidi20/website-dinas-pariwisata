import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import { MDBDataTable } from 'mdbreact';
import axios from 'axios';

import {baseURL} from '../Utils';

export default class Pages extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                columns: [
                    {
                        label: 'Name',
                        field: 'name',
                        sort: 'asc',
                        width: 150
                    },
                    {
                        label: 'Link',
                        field: 'link',
                        sort: 'asc',
                        width: 270
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        sort: 'asc',
                        width: 270
                    },
                ],
                rows: [],
            },
        }
    }

    async getData(){
        // let results = await axios.get(`${baseURL}/`)
    }

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
                                
                                <MDBDataTable
                                    striped
                                    bordered
                                    small
                                    data={this.state.data}
                                />
                                    
                                </div>
                            </div>
                        </div> {/* <!-- .container-fluid --> */}
                    </div> {/* <!-- #page-content --> */}
                </div>
            </>
        );
    }
}
