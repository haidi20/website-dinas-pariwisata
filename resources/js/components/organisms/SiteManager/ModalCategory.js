import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';
import { MDBDataTable, MDBBtn } from 'mdbreact';

import {baseURL} from '../../pages/SiteManager/Utils';

export default class ModalCategory extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                columns: [
                    {
                        label: 'No.',
                        field: 'no.',
                        width: 20,
                        sort: 'asc',
                    },
                    {
                        label: 'Nama',
                        field: 'nama',
                        sort: 'asc',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        width:20,
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
        let results = await axios.get(`${baseURL}/categories`)
                                    .then(res => res.data)
                                    .catch(err => console.log(err));
        let columns = this.state.data.columns;
        let rows = [];
        results.data.map((row,key) => rows.push({
            no: key+1,
            name: row.name,
            action: <><MDBBtn color="warning" onClick={() => alert(`Edit data with ID : ${row.id}`)} rounded >Edit</MDBBtn> <MDBBtn color="danger" onClick={() => alert(`Delete data with ID : ${row.id}`)} rounded >Delete</MDBBtn></>
        }));
        
        this.setState({data:{columns,rows}});
    }

    render() {
        return (
            <>
                {/* <!-- Creates the bootstrap modal where the image will appear --> */}
                <div className="modal fade" id="modalCategory" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div className="modal-dialog modal-lg">
                        <div className="modal-content">
                        <div className="modal-header">
                            <button type="button" className="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span className="sr-only">Close</span></button>
                            <h4 className="modal-title" id="myModalLabel">Caterogies</h4>
                        </div>
                        <div className="modal-body">
                            <div style={{marginBottom:25}}>
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Category</Link>
                            </div>
                            
                            <MDBDataTable
                                striped
                                bordered
                                hover
                                data={this.state.data}
                            />
                            
                        </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
