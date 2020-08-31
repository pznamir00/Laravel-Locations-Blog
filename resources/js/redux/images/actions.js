import types from './types';

const setFilename = filename => ({
  type: types.FILENAME_SET,
  filename
})

const actions = {
  setFilename
}

export default actions;
