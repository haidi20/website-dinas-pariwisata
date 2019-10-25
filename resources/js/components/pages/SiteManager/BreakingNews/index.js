import React, { Component } from 'react';
import {Link} from 'react-router-dom';
import axios from 'axios';

import {baseURL} from '../Utils';

export default class BreakingNews extends Component {
    constructor(props){
        super(props);
        this.state = {
            data: {
                left: [],
                right: []
            }
        }

        this._toRight = this._toRight.bind(this);
        this._toLeft = this._toLeft.bind(this);
    }

    componentDidMount(){
        this.getData();
    }

    async getData(){
        let left = await axios.get(`${baseURL}/breaking-news/unselected`)
                                    .then(res => res.data.data)
                                    .catch(err => console.log(err));
        let right = await axios.get(`${baseURL}/breaking-news/selected`)
                                    .then(res => res.data.data)
                                    .catch(err => console.log(err));
        this.setState({
            data:{
                left,
                right
            }
        });
    }

    async _toRight(bn){
        if(this.state.data.right.length < 5){
            let bodyFormData = new FormData();
            bodyFormData.append('breaking_news', 1);
            bodyFormData.append('_method', 'PATCH');            
            axios({
                method: 'post',
                url: `${baseURL}/breaking-news/update/${bn.id}`,
                data: bodyFormData,
            })
            .then(res => {
                
            })
            .catch(err => {
                console.log('error = ',err);
            });

            let left = this.state.data.left.filter(data => data.id !== bn.id);
            let right = [];
            right = [...this.state.data.right, bn];
            this.setState({
                data:{
                    left,
                    right
                }
            });
        }
    }

    _toLeft(bn){
        let bodyFormData = new FormData();
            bodyFormData.append('breaking_news', 0);
            bodyFormData.append('_method', 'PATCH');            
            axios({
                method: 'post',
                url: `${baseURL}/breaking-news/update/${bn.id}`,
                data: bodyFormData,
            })
            .then(res => {
                
            })
            .catch(err => {
                console.log('error = ',err);
            });

        let right = this.state.data.right.filter(data => data.id !== bn.id);
        let left = [];
        left = [...this.state.data.left, bn];
        this.setState({
            data:{
                left,
                right
            }
        });
    }

    render() {
        let {data} = this.state;
        return (
            <>
                <div className="static-content">
                    <div className="page-content">

                        <ol className="breadcrumb">
                            <li>
                                <Link to="/sitemanager/breaking-news">Breaking News</Link>
                            </li>
                        </ol>

                        <div className="page-heading">
                            <h1>Breaking News</h1>
                        </div>

                        <div className="panel panel-default">
                        <div className="panel-body" style={{textAlign:'center'}}>
                            <div className="row">
                                <div className="col-md-12" style={{height:340}}>

                                    <div style={{marginTop:50}}>
                                        <select className="custom-select" multiple size="12" style={{width:'38rem'}}>
                                            {data.left.map(bn => <option key={bn.id} onClick={() => this._toRight(bn)} value="1">{bn.title}</option>)}
                                        </select>

                                        <i className="fa fa-arrows-h" aria-hidden="true" style={{marginLeft:30, marginRight:30}}></i>

                                        <select className="custom-select" multiple size="12" style={{width:'38rem'}}>
                                            {data.right.map(bn => <option key={bn.id} onClick={() => this._toLeft(bn)} value="1">{bn.title}</option>)}
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div> {/* <!-- .container-fluid --> */}
                        </div>
                    </div> {/* <!-- #page-content --> */}
                </div>
            </>
        );
    }
}
