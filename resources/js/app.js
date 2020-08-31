require('./bootstrap');
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import 'leaflet/dist/leaflet.css';
import { HomeContainer } from './components/Home/index';
import { AddPost, EditPost } from './components/Post/index';
import { SearchFormContainer } from './components/SearchForm/index';
import { store } from './redux/store';
import { Provider } from 'react-redux';



const App = () => {
    return (
      <React.Fragment>
        <Router>
            <Switch>
              <Route exact path='/' component={HomeContainer} />
              <Route path='/management/posts/:id' component={EditPost} />
              <Route exact path='/management/posts' component={AddPost} />
            </Switch>
        </Router>
      </React.Fragment>
    );
}



if (document.getElementById('root')) {
    ReactDOM.render(
      <Provider store={store}>
        <App />
      </Provider>,
      document.getElementById('root')
    )
}

ReactDOM.render(
  <Provider store={store}>
    <SearchFormContainer />
  </Provider>,
  document.getElementById('search-panel')
)
