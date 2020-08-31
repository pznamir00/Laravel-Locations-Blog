import types from './types';

const initState = {
  position: [52, 15],
  zoom: 5,
  locations: [],
}

const homeMapReducer = (state = initState, action) => {
  switch(action.type){
    case types.ZOOM_SET:
      return {
        ...state,
        zoom: action.zoom
      }
    case types.POSITION_INIT:
      return {
        ...state,
        position: action.position
      }
    case types.LOCATIONS_ADD:
      return {
        ...state,
        locations: [...state.locations, action.location]
      }
    default:
      return state
  }
}


export default homeMapReducer;
