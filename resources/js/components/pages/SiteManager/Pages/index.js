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
                        label: 'Nama Menu',
                        field: 'menu',
                        sort: 'asc',
                    },
                    {
                        label: 'Judul',
                        field: 'title',
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
            menu: row.menus.name,
            title: row.title,
            action: <><MDBBtn size="sm" color="success" 
                    onClick={() => alert(`Edit data with ID : ${row.id}`)} 
                    rounded 
                >
                    Edit
                </MDBBtn> 
                <MDBBtn size="sm" color="danger" 
                    onClick={() => alert(`Delete data with ID : ${row.id}`)} 
                    rounded 
                >
                    Delete
                </MDBBtn></>
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
                                    <Link to="/sitemanager/pages/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Pages</Link>
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
