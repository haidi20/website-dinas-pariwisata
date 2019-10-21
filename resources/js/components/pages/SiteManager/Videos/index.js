import React, { Component } from 'react';
import {Link} from 'react-router-dom';

//Atom Component
import CardVideo from '../../../atoms/CardVideo';

export default class Videos extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">

                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/videos">Videos</Link>
                        </li>
                    </ol>

                    <div className="page-heading">
                        <h1>Videos</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="#" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Video</Link>
                            </div>
                        </div>
                    </div> 

                    <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}>Videos List</div>
                        <div className="panel-body">  
                            <div className="container-fluid">
                                <div className="row">
                                    <div className="col-md-12">
                                    
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
                                        />
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
                                        />
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
                                        />
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
                                        />
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
                                        />
                                    <CardVideo 
                                        src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" 
                                        title="Big Buck Bunny_720p_1mb"
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
