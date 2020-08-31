import types from './types';

const _switch = (value) => ({
  type: types.VALID_SWITCH,
  value
})

const setAddressField = (field, value) => ({
  type: types.ADDRESS_FIELD_SET,
  field,
  value
})

const actions = {
  _switch,
  setAddressField
}

export default actions;
