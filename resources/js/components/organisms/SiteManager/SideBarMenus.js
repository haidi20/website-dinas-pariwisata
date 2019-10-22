import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class SideBarMenus extends Component {
    constructor(props){
        super(props);

        this.state = {
            img: "http://localhost:3000/avenger/assets/demo/avatar/administrator.png",
        };
    }

    render() {
        return (
        <>
            <div className="static-sidebar-wrapper sidebar-inverse">
                <div className="static-sidebar">
                    <div className="sidebar">

                        <div className="widget stay-on-collapse" id="widget-welcomebox">
                            <div className="widget-body welcome-box tabular">
                                <div className="tabular-row">
                                    <div className="tabular-cell welcome-avatar">
                                        <Link to="#"><img src={this.state.img} className="avatar"/></Link>
                                    </div>
                                    <div className="tabular-cell welcome-options">
                                        <span className="welcome-text">Welcome,</span>
                                        <Link to="/sitemanager" className="name">Administrator</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="widget stay-on-collapse" id="widget-sidebar">
                            <nav role="navigation" className="widget-body">
                                <ul className="acc-menu">
                                    <li className="nav-separator">Explore</li>
                                    <li className="">
                                        <Link to="/sitemanager"><i className="fa fa-home"></i><span>Dashboard</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/menu"><i className="fa fa-tasks"></i><span>Menu</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/post"><i className="fa fa-file-text"></i><span>Posts</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/breaking-news"><i className="fa fa-newspaper-o"></i><span>Breaking News</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/pages"><i className="fa fa-file-text-o"></i><span>Pages</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/images"><i className="fa fa-file-picture-o"></i><span>Images</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/videos"><i className="fa fa-file-video-o"></i><span>Videos</span></Link>
                                    </li>
                                    <li className="">
                                        <Link to="/sitemanager/social-media"><i className="fa fa-comments-o"></i><span>Social Media</span></Link>
                                    </li>
                                    <li className="nav-separator"></li>
                                    <li><Link to="/" target="_blank"><i className="fa fa-globe"></i><span>View Website</span></Link></li>
                                    <li className="nav-separator">&nbsp;</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </>
        );
  }
}
