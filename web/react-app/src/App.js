// @flow
import React, { Component } from 'react';
import { Router, Route, browserHistory } from 'react-router'
import { Provider } from 'react-redux';

import HomeScene from './containers/Home/scenes/HomeScene'
import ResultScene from './containers/Result/scenes/ResultScene'
import PostScene from './containers/Post/scenes/PostScene'
import configureStore from './store/configure-store';
import './App.css'

const store = configureStore();

class App extends Component {
  render() {
    return (
      <Provider store={store}>
        <Router history={browserHistory}>
          <Route path="/" component={HomeScene} />
          <Route path="/result" component={ResultScene}/>
          <Route path="/post" component={PostScene}/>
        </Router>
      </Provider>
    )
  }
}

export default App
