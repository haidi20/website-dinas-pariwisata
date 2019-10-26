import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';
import { MDBDataTable, MDBBtn } from 'mdbreact';
import {baseURL} from '../Utils';

import ModalCategory from '../../../organisms/SiteManager/ModalCategory';

export default class Posts extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                columns:[
                    {
                        label: 'No.',
                        field: 'no.',
                        sort: 'asc',
                    },
                    {
                        label: 'Category',
                        field: 'id category',
                        sort: 'asc',
                    },
                    {
                        label: 'Judul',
                        field: 'title',
                        sort: 'asc',
                    },
                    {
                        label: 'Dibaca',
                        field: 'read',
                        sort: 'asc',
                    },
                    {
                        label: 'Terakhir dibaca',
                        field: 'breaking news',
                        sort: 'asc',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        sort: 'asc',
                    },
                ],
                rows:[]
            }
        };
    }

    componentDidMount(){
        this.getData();
    }

    async getData(){
        let results = await axios.get(`${baseURL}/posts`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        results.data.map((row,key) => rows.push({
            no: key+1,
            category: row.category.name,
            title: row.title,
            // content: row.content,
            read: row.read,
            created_at: row.created_at,
            action: <><MDBBtn size="sm" color="success" onClick={() => 
                    alert(`Edit data with ID : ${row.id}`)} rounded 
                >
                    Edit
                </MDBBtn> 
                <MDBBtn size="sm" color="danger" onClick={() => 
                    alert(`Delete data with ID : ${row.id}`)} 
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
                                <Link to="/sitemanager/post">Post</Link>
                            </li>
                        </ol>

                        <div className="page-heading">
                            <h1>Post</h1>
                            <div className="options">
                                <div className="btn-toolbar">
                                    <a data-toggle="modal" data-target="#modalCategory" className="btn btn-default" style={{marginRight:5}}><i className="fa fa-tasks"></i> Kategori</a>
                                    <Link to="/sitemanager/post/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Post</Link>
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
                                        small
                                        data={this.state.data}
                                    />
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
