// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class GalleryImage extends Component {
	static slug = 'cacm_gallery_image';

	render() {
	    return (
	    	<Fragment>
				<div className={"item"}>
	                <a className={"gallery-image"} href={this.props.image}>
	                    <img src={this.props.image} alt={this.props.image_title} />
	                </a>
            	</div>
			</Fragment>
	    );
	}
}

export default GalleryImage;
