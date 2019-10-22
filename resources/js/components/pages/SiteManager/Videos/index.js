import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

//Atom Component
import CardVideo from '../../../atoms/CardVideo';

export default class Videos extends Component {
    constructor(props){
        super(props);

        this.state = {
            videos: []
        };
    }

    componentDidMount(){
        this.getData();
    }

    async getData() {
        const results = await axios.get('http://localhost:8000/api/sitemanager/videos')
            .then(res => res.data);
        let videos = this.state.videos;

        results.data.map(v => videos.push({
            created_at: v.created_at,
            id: v.id,
            link: v.link,
            name: v.name,
            type: v.type,
            updated_at: v.updated_at,
        }));
        this.setState({videos});
    }

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
                                    <Link to="/sitemanager/videos/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Video</Link>
                                </div>
                            </div>
                        </div> 

                        <div className="panel panel-default">
                            <div className="panel-heading" style={{fontWeight:'bold'}}>Videos List</div>
                            <div className="panel-body">  
                                <div className="container-fluid">
                                    <div className="row">

                                        {this.state.videos.map(vid => <CardVideo
                                            key={vid.id}
                                            src={vid.link}
                                            title={vid.name}
                                            id={vid.id}
                                            />
                                        )}
                                            
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
