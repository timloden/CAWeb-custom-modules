// External Dependencies
import React, { Component, Fragment } from 'react';
// import OwlCarousel from 'react-owl-carousel';

// Internal Dependencies
import './style.css';

class MediaSlide extends Component {
	static slug = 'cacm_media_slider_slide';

	render() {
	    return (
	    	<Fragment>
				<div className={"item"}>
	                <div className={"preview-image"}>
	                    <img src={this.props.image} alt={this.props.title} />
	                </div>
	                <div className="details">
	                    {this.props.content()}
	                </div>
            	</div>
			</Fragment>
	    );
	}
}

export default MediaSlide;
