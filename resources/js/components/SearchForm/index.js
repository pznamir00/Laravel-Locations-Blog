import React, { useState, useEffect, useRef } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Form from './Form';


const SearchForm = () => {

  const [val, setVal] = useState("");
  const [posts, setPosts] = useState([]);
  const prevVal = useRef();

  useEffect(() => {
    if(prevVal.current !== val){
      axios.post('/filter_locations', {
        keyword: val,
      })
      .then(res => {
        setPosts(res.data);
        prevVal.current = val;
      })
      .catch(error => console.log(error));
    }
  });

  return (
    <React.Fragment>
      <Form
        posts={posts}
        changeHandle={(e) => setVal(e.target.value)}
      />
    </React.Fragment>
  );
}



export default SearchForm;
