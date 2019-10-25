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
                    },
                    {
                        label: 'Link',
                        field: 'link',
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
        let result = await axios(`${baseURL}/social-media`)
                            .then(res => res.data)
                            .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        result.data.map(row => rows.push({
            name: row.name,
            link: row.link,
            action: <><MDBBtn size="sm" color="success" onClick={() => alert(`Edit data with ID : ${row.id}`)} rounded > Edit</MDBBtn> <MDBBtn size="sm" color="danger" onClick={() => alert(`Delete data with ID : ${row.id}`)} rounded >Delete</MDBBtn></>
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
                        
                        <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}></div>
                        <div className="panel-body"></div>
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
                        </div> {/* <!-- .container-fluid --> */}
                    </div>
                </div>
            </>
        );
    }
}
