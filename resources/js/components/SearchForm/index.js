import React, { useEffect } from 'react';
import Form from './Form';
import axios from 'axios';
import actions from '../../redux/filtersByKeywords/actions';
import { connect } from 'react-redux';



const SearchForm = props => {

  const keywordsChangedHandle = e => {
    const { value } = e.target;
    props.setKeywords(value);
  }

  useEffect(() => {
    axios.get(`/posts/filters?keywords=${props.keywords}`)
    .then(res => {
      props.fetchPosts(res.data);
    })
    .catch(error => console.log(error));
  }, [props.keywords]);

  return (
    <Form
      posts={props.posts}
      changeHandle={keywordsChangedHandle}
      keywords={props.keywords}
      reset={props.reset}
    />
  );
}



const mapStateToProps = state => {
  return {
    keywords: state.filtersByKeywords.keywords,
    posts: state.filtersByKeywords.posts
  }
}

const mapDispatchToProps = dispatch => ({
  setKeywords: keywords => dispatch(actions.setKeywords(keywords)),
  fetchPosts: posts => dispatch(actions.fetchPosts(posts)),
  reset: () => dispatch(actions.reset())
})

export const SearchFormContainer = connect(mapStateToProps, mapDispatchToProps)(SearchForm)
