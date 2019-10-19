import React, {Component} from 'react';
import {Link} from 'react-router-dom';

export default class HeaderSiteManager extends Component {
  render(){
    return (
      <header id="topnav" className="navbar navbar-inverse navbar-fixed-top clearfix" role="banner">

        <span id="trigger-sidebar" className="toolbar-trigger toolbar-icon-bg">
          <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
            <span className="icon-bg"><i className="fa fa-fw fa-bars"></i></span>
          </a>
        </span>

        <Link className="navbar-brand" to="#">kreasibeton</Link>

        <span id="trigger-infobar" className="toolbar-trigger toolbar-icon-bg">
          <Link data-toggle="tooltips" data-placement="left" title="Toggle Infobar"></Link>
        </span>

        <ul className="nav navbar-nav toolbar pull-right" data-auto-collapse="false">

          <li className="dropdown toolbar-icon-bg">
            <Link to="#" className="dropdown-toggle" data-toggle='dropdown'><span className="icon-bg"><i className="fa fa-fw fa-user"></i></span></Link>
            <ul className="dropdown-menu userinfo arrow" data-auto-collapse="false">
              <li className="{{ active_menu('sitemanager/user*') }}">
                <Link to="{{ url('sitemanager/user') }}">
                  <span className="pull-left">User Account</span> <i className="pull-right fa fa-user"></i>
                </Link>
              </li>
              <li className="{{ active_menu('sitemanager/change-password') }}">
                <Link to="{{ url('sitemanager/change-password') }}">
                  <span className="pull-left">Change Password</span> <i className="pull-right fa fa-lock"></i>
                </Link>
              </li>
              <li className="{{ active_menu('sitemanager/setting/contact') }}">
                <Link to="{{ url('sitemanager/setting/contact') }}">
                  <span className="pull-left">Setting</span> <i className="pull-right fa fa-cog"></i>
                </Link>
              </li>
              {/* <!-- <li><Link to="#"><span className="pull-left">Settings</span> <i className="pull-right fa fa-cog"></i></Link></li> --> */}
              <li className="divider"></li>
              <li><Link to="{{ url('sitemanager/logout') }}"><span className="pull-left">Sign Out</span> <i className="pull-right fa fa-sign-out"></i></Link></li>
            </ul>
          </li>

        </ul>

      </header>
    );
  }
}

