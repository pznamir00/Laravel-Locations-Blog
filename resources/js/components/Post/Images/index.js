import React, { useState } from 'react';
import './style.css';

const Images = (props) => {
  const [image, setImage] = useState(props.loadImg ? props.loadImg : "");
  const updateImage = (e) => {
    var file = e.target.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => setImage(reader.result);
    reader.onerror = (error) => console.log(error);
    if(props.loadImg){
      $('input[name="imgWasChanged"]').val("true");
    }
  };

  return (
    <React.Fragment>
      <input type="file" accept="image/*" name="main_image" onChange={updateImage}/>
      <img src={image} className="mt-5 mb-5" id="main-image" alt="Main image"/>
    </React.Fragment>
  );
}

export default Images;
