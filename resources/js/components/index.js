import React, { Component } from 'react';
import ReactDOM from 'react-dom';

//redux
import {createStore} from 'redux';
import { Provider } from 'react-redux';
import rootReducer from '../config/redux/reducers';

const storeRedux = createStore(rootReducer);

//sitemanager
import AppSiteManager from './pages/SiteManager';

//app-sitemanager
if (document.getElementById('app-sitemanager')) {
    ReactDOM.render(<AppSiteManager />, document.getElementById('app-sitemanager'));
}

//website
import Home from './pages/Website/Home';

if (document.getElementById('website-home')) {
    ReactDOM.render(<Provider store={storeRedux}><Home /></Provider>, document.getElementById('website-home'));
}
