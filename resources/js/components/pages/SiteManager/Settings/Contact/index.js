import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class Contact extends Component {
  render() {
    return (
        <>
            <div className="static-content">
                <div className="page-content">
        
                    <ol className="breadcrumb">
                        <li>
                            <Link to="/sitemanager/">Home</Link>
                        </li>
                        <li>
                            <Link to="/sitemanager/setting-contact">Setting</Link>
                        </li>
                        <li>
                            <Link to="/sitemanager/setting-contact">Contact</Link>
                        </li>
                    </ol>

                    <div className="page-heading">            
                        <h1>Contact</h1>
                    </div>
                    
                    <div className="panel panel-default">
                        <div className="panel-heading" style={{fontWeight:'bold'}}>
                            Contact
                        </div>
                        <div className="panel-body"> 
                            <div className="container-fluid">
                                <div className="row">
                                    <div className="col-md-12">

                                    <form>
                                        <div class="form-group">
                                            <label for="comment" style={{fontWeight:'bold'}}>Address</label>
                                            <textarea class="form-control" rows="5" id="comment" placeholder="CKEDITOR"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" style={{fontWeight:'bold'}}>Phone</label>
                                            <textarea class="form-control" rows="5" id="comment" placeholder="CKEDITOR"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" style={{fontWeight:'bold'}}>Fax</label>
                                            <textarea class="form-control" rows="5" id="comment" placeholder="CKEDITOR"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" style={{fontWeight:'bold'}}>Email</label>
                                            <textarea class="form-control" rows="5" id="comment" placeholder="CKEDITOR"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" style={{fontWeight:'bold'}}>Time</label>
                                            <textarea class="form-control" rows="5" id="comment" placeholder="CKEDITOR"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i className="fa fa-save"></i> Simpan</button>
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
  }
}
