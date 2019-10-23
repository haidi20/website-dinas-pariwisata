import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL} from '../Utils';

//Atom Component
import CardImage from '../../../atoms/CardImage';

export default class Images extends Component {
    constructor(props){
        super(props);
        this.state = {
            images: []
        }
    }

    componentDidMount(){
        this.getData();
    }

    async getData(){
        const results = await axios.get(`${baseURL}/images`)
                        .then(res => res.data)
                        .catch(err => console.log(err));
        let images = this.state.images;

        results.data.map(img => images.push({
            created_at: img.created_at,
            id: img.id,
            link: img.link,
            name: img.name,
            type: img.type,
            updated_at: img.updated_at,
        }));
        this.setState({images});
    }

    render() {
        let {images} = this.state;
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
                                    <Link to="/sitemanager/images/create" className="btn btn-primary"><i className="fa fa-plus"></i> Tambah Images</Link>
                                </div>
                            </div>
                        </div> 

                        <div className="panel panel-default">
                            <div className="panel-heading" style={{fontWeight:'bold'}}>Images List</div>
                            <div className="panel-body">  
                                <div className="container-fluid">
                                    <div className="row">
                                        <div className="col-md-12">
                                        
                                        {images.map(img => <CardImage
                                            key={img.id}
                                            id={img.id}
                                            src={`http://localhost:3000/images/pemerintah/${img.name}`} 
                                            title={img.name}
                                            />
                                        )}
                                            
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
