import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

require('react-jquery-datatables/css/datatables.min.css')

import {baseURL} from '../Utils';
import { MDBDataTable, MDBBtn } from 'mdbreact';

export default class Menu extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                columns:[
                    {
                        label: "Id",
                        field: "id",
                        width: 150
                      },       {
                        label: "Name",
                        field: "name",
                        width: 270
                      },
                      {
                        label: "Warna",
                        field: "category",
                        width: 270
                      },
                      {
                        label: "Urutan",
                        field: "average",
                        width: 270
                      },
                      {
                        label: "Action",
                        field: "updatedAt",
                        width: 270
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
        let results = await axios.get(`${baseURL}/menus`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        results.data.map((row,key) => rows.push({
            no: key+1,
            name: row.name,
            color: <MDBBtn size="lg" style={{backgroundColor:row.color}} ></MDBBtn>,
            order: row.order,
            action: <>
                <MDBBtn size="sm" color="info" 
                    onClick={() => alert(`Edit data with ID : ${row.id}`)} 
                    rounded 
                >
                    subMenu
                </MDBBtn> 
                <MDBBtn size="sm" color="success" 
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
                </MDBBtn>
            </>
        }));
        
        this.setState({
            data:{
                columns,
                rows
            }
        });
    }

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

                                    <MDBDataTable
                                        striped
                                        bordered
                                        hover
                                        small
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
