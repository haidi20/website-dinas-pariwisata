import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import { MDBBtn, MDBDataTable } from 'mdbreact';
import axios from 'axios';

import {baseURL} from '../Utils';

export default class SocialMedia extends Component {
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

    componentDidMount(){
        this.getData();
    }

    async getData(){
        let result = await axios(`${baseURL}/social-media`)
                            .then(res => res.data)
                            .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        result.data.map(row => rows.push({
            name: row.name,
            link: row.link,
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
                                <Link to="/sitemanager/social-media">Social Media</Link>
                            </li>
                        </ol>

                        <div className="page-heading">            
                            <h1>Social Media</h1>
                            <div className="options">
                                <div className="btn-toolbar">
                                    <Link to="/sitemanager/social-media/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Social Media</Link>
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
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
