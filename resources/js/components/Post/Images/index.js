import React, { useRef, useMemo } from 'react';
import './style.css';
import actions from '../../../redux/images/actions';
import { connect } from 'react-redux';

const Images = props => {

  useMemo(() => {
    if(props.fileInstance !== undefined){
      props.setFilename(props.fileInstance);
    }
  }, [])

  const imgWasChanged = useRef(document.querySelector('input[name="imgWasChanged"]'))

  const updateImage = (e) => {
    var file = e.target.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => props.setFilename(reader.result);
    reader.onerror = error => console.log(error);
    if(props.fileInstance){
      imgWasChanged.current.value = "true";
    }
  };

  return (
    <React.Fragment>
      <input type="file" accept="image/*" name="main_image" onChange={updateImage}/>
      {props.filename &&
        <img src={props.filename} className="mt-5 mb-5" id="main-image" alt="Main image"/>
      }
    </React.Fragment>
  );
}




const mapStateToProps = state => {
  return {
    filename: state.images.filename
  }
}

const mapDispatchToProps = dispatch => ({
  setFilename: filename => dispatch(actions.setFilename(filename))
})

export const ImagesContainer = connect(mapStateToProps, mapDispatchToProps)(Images)
