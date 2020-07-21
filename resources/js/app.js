require('./bootstrap');
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import 'leaflet/dist/leaflet.css';
import Home from './components/Home/index';
import { AddPost, EditPost } from './components/Post/index';
import SearchForm from './components/SearchForm/index';


const App = () => {
    return (
      <React.Fragment>
        <Router>
            <Switch>
              <Route exact path='/' component={Home} />
              <Route path='/posts/add' component={AddPost} />
              <Route path='/posts/edit/:id' component={EditPost} />
            </Switch>
        </Router>
      </React.Fragment>
    );
}

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}

ReactDOM.render(<SearchForm/>, document.getElementById('search-panel'))
