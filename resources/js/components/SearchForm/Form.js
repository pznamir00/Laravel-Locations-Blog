import React, { useState, useCallback } from 'react';
import './style.css';


const Form = props => {
  const showList = useCallback(() => $('#search-dropdown').toggle(), []);
  const hideList = useCallback(() => setTimeout(() => $('#search-dropdown').hide(), 100), []);

  return (
    <React.Fragment>
      <div className="dropdown">
        <input type='text' id='search-input' className='form-control' value={props.keywords} placeholder="Search location" onChange={props.changeHandle} onFocus={showList} onBlur={hideList}/>
        <i className='fa fa-times' id="reset-button" onClick={props.reset}></i>
        <div id="search-dropdown" className="dropdown-content">
          {props.posts.map((post, key) =>
            <a href={'/posts/'+post.id} className="list-group-item-dark" key={key}>
              <h6>{post.title}</h6>
              <p>Address: {post.location.street}, {post.location.city}</p>
              <p>Category: {post.category.title}</p>
            </a>
          )}
        </div>
      </div>
    </React.Fragment>
  );
}


export default Form;
