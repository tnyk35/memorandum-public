/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BroweserRouter, Switch, Route, BrowserRouter} from 'react-router-dom';

import Home from './pages/Home';
import About from './pages/About';
// import Login from './pages/Login';
import Article from './pages/Article';

// import Dashboard from './pages/admin/Dashboard';

export default class App extends Component {
    render() {
        return (
            <div className="container">
              <Switch>
                <Route path="/" component={Home} exact />
                <Route path="/page/:paged" component={Home} exact />
                <Route path="/about" component={About} exact />
                {/* <Route path="/login" component={Login} exact /> */}
                <Route path="/article/:id" component={Article} />
                {/* <Route path="/admin/" component={Dashboard} exact /> */}
              </Switch>
            </div>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(
      <BrowserRouter>
        <App />
      </BrowserRouter>, document.getElementById('app'));
}
