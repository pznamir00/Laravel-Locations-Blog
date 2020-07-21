import React from 'react';
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


const EditPost = (id) => {
  const loadLocationData = {
      street:           $('input[name="street_instance"]').val(),
      address_number:   $('input[name="address_number_instance"]').val(),
      city:             $('input[name="city_instance"]').val(),
      zipcode:          $('input[name="zipcode_instance"]').val()
  };

  const loadImg =function(){
    return $('input[name="imageUrlInstance"]').val();
  };

  return (
    <React.Fragment>
      <Images loadImg={loadImg}/>
      <LocationHandle loadData={loadLocationData}/>
    </React.Fragment>
  );
}


export {
  AddPost,
  EditPost
}
