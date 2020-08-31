import types from './types';

const setKeywords = (keywords) => ({
  type: types.KEYWORDS_SET,
  keywords
})

const fetchPosts = (posts) => ({
  type: types.POSTS_FETCHED,
  posts
})

const reset = () => ({
  type: types.KEYWORDS_RESET
})

const actions = {
  setKeywords,
  fetchPosts,
  reset
}

export default actions;
