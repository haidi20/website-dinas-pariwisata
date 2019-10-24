import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import { MDBDataTable, MDBBtn } from 'mdbreact';
import axios from 'axios';

import {baseURL} from '../Utils';

export default class Pages extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                columns: [
                    {
                        label: 'No.',
                        field: 'no.',
                        sort: 'asc',
                    },
                    {
                        label: 'ID Menu',
                        field: 'id menu',
                        sort: 'asc',
                    },
                    {
                        label: 'Title',
                        field: 'title',
                        sort: 'asc',
                    },
                    {
                        label: 'Content',
                        field: 'content',
                        sort: 'asc',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        sort: 'asc',
                    },
                ],
                rows: [],
            },
        }
    }

    componentDidMount(){
        this.getData();
    }

    async getData(){
        let results = await axios.get(`${baseURL}/pages`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        results.data.map((row,key) => rows.push({
            no: key+1,
            menu_id: row.menu_id,
            title: row.title,
            content: row.content,
            action: <><MDBBtn color="warning" onClick={() => alert(`Edit data with ID : ${row.id}`)} rounded size="sm">Edit</MDBBtn> <MDBBtn color="danger" onClick={() => alert(`Delete data with ID : ${row.id}`)} rounded size="sm">Delete</MDBBtn></>
        }));
        
        this.setState({data:{columns,rows}});
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

                        <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}></div>
                        <div className="panel-body"></div>
                        <div className="container-fluid">
                            <div className="row">
                                <div className="col-md-12">

                                <MDBDataTable
                                    striped
                                    bordered
                                    hover
                                    data={this.state.data}
                                />  
                                
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
