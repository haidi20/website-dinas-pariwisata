import React, { Component } from 'react';
import {
    BrowserRouter,
    Switch,
    Route
} from "react-router-dom";

//pages
import Dashboard from './Dashboard';
import HeaderSiteManager from '../../organisms/SiteManager/HeaderSiteManager';
import SideBarMenus from '../../organisms/SiteManager/SideBarMenus';

export default class AppSiteManager extends Component {
    render(){
        return(
            <BrowserRouter>
                <HeaderSiteManager/>
                <div id="wrapper">
                    <div id="layout-static">

                        {/* @include('sitemanager._layout.sidebar') */}
                        <SideBarMenus/>

                        <div class="static-content-wrapper">
                        <Switch>
                            <Route path='/sitemanager' exact component={Dashboard} />
                        </Switch>

                        {/* @include('sitemanager._layout.footer') */}
                        </div>
                    </div>
                </div>
            </BrowserRouter>
        )
    }
}
