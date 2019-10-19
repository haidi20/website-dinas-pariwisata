import React, { Component } from 'react';
import ReactDOM from 'react-dom';

//sitemanager
import AppSiteManager from './pages/SiteManager';

//app-sitemanager
if (document.getElementById('app-sitemanager')) {
    ReactDOM.render(<AppSiteManager />, document.getElementById('app-sitemanager'));
}

//website
import Home from './pages/Website/Home';

if (document.getElementById('website-home')) {
    ReactDOM.render(<Home />, document.getElementById('website-home'));
}
