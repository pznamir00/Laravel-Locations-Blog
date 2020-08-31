import types from './types';

const initState = {
  valid: false,
  address: {
    street: "",
    address_number: "",
    city: "",
    zipcode: ""
  }
}

const locationManagementReducer = (state = initState, action) => {
  switch(action.type){
    case types.VALID_SWITCH:
      return {
        ...state,
        valid: action.value
      }
    case types.ADDRESS_FIELD_SET:
      return {
        ...state,
        address: {
          ...state.address,
          [action.field]: action.value
        }
      }
    default:
      return state
  }
}


export default locationManagementReducer;
