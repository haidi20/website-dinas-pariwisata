import React, { Component } from 'react';
import {Link} from 'react-router-dom';

export default class SideBarMenus extends Component {
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
                                    <Link to="#"><img src="avenger/assets/demo/avatar/administrator.png" className="avatar"/></Link>
                                </div>
                                <div className="tabular-cell welcome-options">
                                    <span className="welcome-text">Welcome,</span>
                                    <Link to="#" className="name">Username</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" className="widget-body">
                            <ul className="acc-menu">
                                <li className="nav-separator">Explore</li>
                                <li className="{{ active_menu('sitemanager') }}">
                                    <Link to="/sitemanager"><i className="fa fa-home"></i><span>Dashboard</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/inbox*') }}">
                                    <Link to="#"><i className="fa fa-inbox"></i><span>Inbox</span></Link>
                                </li>
                                {/* {{-- <li className="{{ active_menu('sitemanager/testimonial*') }}">
                                    <Link to="{{ url('sitemanager', ['testimonial']) }}">@fa('comment')<span>Testimonial</span></Link>
                                </li> --}} */}
                                <li className="{{ active_menu('sitemanager/menu*') }}">
                                    <Link to="#"><i className="fa fa-tasks"></i><span>Menu</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/gallery*') }}">
                                    <Link to="#"><i className="fa fa-file-picture-o"></i><span>Gallery</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/post*') }}">
                                    <Link to="#"><i className="fa fa-file-text"></i><span>Posts</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/page*') }}">
                                    <Link to="#"><i className="fa fa-file-text-o"></i><span>Pages</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/slider*') }}">
                                    <Link to="#"><i className="fa fa-sliders"></i><span>Slider</span></Link>
                                </li>
                                <li className="{{ active_menu('sitemanager/media*') }}">
                                    <Link to="#"><i className="fa fa-comments-o"></i><span>Social Media</span></Link>
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
