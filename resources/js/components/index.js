import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import '../public/css/index.css';

// pages
//sitemanager


//website
import Home from './pages/Website/Home';

if (document.getElementById('website-home')) {
    ReactDOM.render(<Home />, document.getElementById('website-home'));
}
