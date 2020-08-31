import types from './types';

const initState = {
  keywords: "",
  posts: []
}

const filtersByKeywordsReducer = (state = initState, action) => {  
  switch(action.type){
    case types.KEYWORDS_SET:
      return {
        ...state,
        keywords: action.keywords
      }
    case types.POSTS_FETCHED:
      return {
        ...state,
        posts: action.posts
      }
    case types.KEYWORDS_RESET:
      return {
        ...state,
        keywords: ""
      }
    default:
      return state
  }
}


export default filtersByKeywordsReducer;
