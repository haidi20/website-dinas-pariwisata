import React, { Component } from 'react';
import {
    BrowserRouter,
    Switch,
    Route
} from "react-router-dom";

//pages
import Dashboard from './Dashboard';
import Menu from './Menu';
import Posts from './Posts';
import BreakingNews from './BreakingNews';
import Pages from './Pages';
import Images from './Images';
import Videos from './Videos';
import User from './Settings/User';
import Password from './Settings/Password';
import Contact from './Settings/Contact';
import CreateMenu from './Menu/create';

//organism
import HeaderSiteManager from '../../organisms/SiteManager/HeaderSiteManager';
import SideBarMenus from '../../organisms/SiteManager/SideBarMenus';
import FooterSiteManager from '../../organisms/SiteManager/FooterSiteManager';
import SocialMedia from './SocialMedia';

export default class AppSiteManager extends Component {
    render(){
        return(
            <BrowserRouter>
                <HeaderSiteManager/>
                <div id="wrapper">
                    <div id="layout-static">

                        {/* @include('sitemanager._layout.sidebar') */}
                        <SideBarMenus/>

                        <div className="static-content-wrapper">
                        <Switch>
                            <Route path='/sitemanager' exact component={Dashboard} />
                            <Route path='/sitemanager/menu' exact component={Menu} />
                            <Route path='/sitemanager/menu/create' exact component={CreateMenu} />
                            <Route path='/sitemanager/post' exact component={Posts} />
                            <Route path='/sitemanager/breaking-news' exact component={BreakingNews} />
                            <Route path='/sitemanager/pages' exact component={Pages} />
                            <Route path='/sitemanager/images' exact component={Images} />
                            <Route path='/sitemanager/videos' exact component={Videos} />
                            <Route path='/sitemanager/social-media' exact component={SocialMedia} />
                            <Route path='/sitemanager/setting-user' exact component={User} />
                            <Route path='/sitemanager/change-password' exact component={Password} />
                            <Route path='/sitemanager/setting-contact' exact component={Contact} />
                        </Switch>

                        {/* @include('sitemanager._layout.footer') */}
                        <FooterSiteManager/>
                        </div>
                    </div>
                </div>
            </BrowserRouter>
        )
    }
}
