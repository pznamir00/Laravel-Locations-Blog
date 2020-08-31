import types from './types';

const initState = {
  filename: ""
}

const imagesReducer = (state = initState, action) => {
  switch(action.type){
    case types.FILENAME_SET:
      return {
        ...state,
        filename: action.filename
      }
    default:
      return state
  }
}


export default imagesReducer;
