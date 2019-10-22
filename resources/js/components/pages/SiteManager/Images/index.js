import React, { Component } from 'react';
import {Link} from 'react-router-dom';

//Atom Component
import CardImage from '../../../atoms/CardImage';

export default class Images extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/images">Images</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Images</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Images</Link>
                            </div>
                        </div>
                    </div> 

                    <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}>Images List</div>
                        <div className="panel-body">  
                            <div className="container-fluid">
                                <div className="row">
                                    <div className="col-md-12">
                                    
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                    <CardImage 
                                        src="https://dummyimage.com/200x200/bfbfbf/a6a6a6" 
                                        title="200x200 Image"
                                        />
                                        
                                    </div>
                                </div>
                            </div> {/* <!-- .container-fluid --> */}
                        </div>
                    </div>

                </div> {/* <!-- #page-content --> */}
            </div>
        </>
    );
  }
}
