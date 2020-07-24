import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Form from './Form';


const SearchForm = () => {

  const [val, setVal] = useState("");
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    axios.post('/locations/filter', {
      keyword: val,
    })
    .then(res => {
      setPosts(res.data);
    })
    .catch(error => console.log(error));
  }, [val]);

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
