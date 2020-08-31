import { combineReducers } from 'redux'
import filtersByKeywordsReducer from './filtersByKeywords/reducer'
import homeMapReducer from './homeMap/reducer'
import imagesReducer from './images/reducer'
import locationManagementReducer from './locationManagement/reducer'


const reducers = combineReducers({
  filtersByKeywords: filtersByKeywordsReducer,
  homeMap: homeMapReducer,
  images: imagesReducer,
  locationManagement: locationManagementReducer
});


export default reducers;
