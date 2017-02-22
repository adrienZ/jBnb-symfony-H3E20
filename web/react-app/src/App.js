// @flow
import React, { Component } from 'react';
import { Router, Route, browserHistory } from 'react-router'

import HomeScene from './containers/Home/scenes/HomeScene'
import ResultScene from './containers/Result/scenes/ResultScene'
import './App.css'

class App extends Component {
  render() {
    return (
      <Router history={browserHistory}>
        <Route path="/" component={HomeScene}>
          {/* <Route path="users" component={Users}>
            <Route path="/user/:userId" component={User}/>
          </Route> */}
          {/* <Route path="*" component={NoMatch}/> */}
        </Route>
        <Route path="result" component={ResultScene}/>
      </Router>
    )
  }
}

export default App
