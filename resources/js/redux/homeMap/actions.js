import types from './types';

const setZoom = zoom => ({
  type: types.ZOOM_SET,
  zoom
})

const initPosition = pos => ({
  type: types.POSITION_INIT,
  pos
})

const addLocation = location => ({
  type: types.LOCATIONS_ADD,
  location
})

const actions = {
  setZoom,
  initPosition,
  addLocation
}

export default actions;
