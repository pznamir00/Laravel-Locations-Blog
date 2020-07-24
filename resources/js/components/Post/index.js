import React, { useRef } from 'react';
import axios from 'axios';
import LocationHandle from './Location/index';
import Images from './Images/index';




const AddPost = () => {
  return (
    <React.Fragment>
      <Images/>
      <LocationHandle/>
    </React.Fragment>
  );
}


const EditPost = () => {
  const imgUrl = useRef($('input[name="imageUrlInstance"]').val());
  const locationsData = useRef({
    street:           $('input[name="street_instance"]').val(),
    address_number:   $('input[name="address_number_instance"]').val(),
    city:             $('input[name="city_instance"]').val(),
    zipcode:          $('input[name="zipcode_instance"]').val()
  });

  return (
    <React.Fragment>
      <Images
        imgUrl={imgUrl.current}
      />
      <LocationHandle
        locationsData={locationsData.current}
      />
    </React.Fragment>
  );
}

export {
  AddPost,
  EditPost
}
