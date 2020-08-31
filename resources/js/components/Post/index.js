import React, { useRef } from 'react';
import axios from 'axios';
import { LocationHandleContainer } from './Location/index';
import { ImagesContainer } from './Images/index';




const AddPost = () => {
  return (
    <React.Fragment>
      <ImagesContainer/>
      <LocationHandleContainer/>
    </React.Fragment>
  );
}


const EditPost = () => {

  const fileInstance = useRef(document.querySelector('input[name="imageUrlInstance"]').value);
  const addressInstance = useRef({
    street:           document.querySelector('input[name="street_instance"]').value,
    address_number:           document.querySelector('input[name="address_number_instance"]').value,
    city:             document.querySelector('input[name="city_instance"]').value,
    zipcode:          document.querySelector('input[name="zipcode_instance"]').value
  });

  return (
    <React.Fragment>
      <ImagesContainer
        fileInstance={fileInstance.current}
      />
      <LocationHandleContainer
        addressInstance={addressInstance.current}
      />
    </React.Fragment>
  );
}

export {
  AddPost,
  EditPost
}
