import React, { Component } from 'react';
import {Link} from 'react-router-dom';

import DatatablePage from '../../atoms/DataTables';

export default class ModalCategory extends Component {
    constructor(props){
        super(props);
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
                            <DatatablePage/>
                        </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}
