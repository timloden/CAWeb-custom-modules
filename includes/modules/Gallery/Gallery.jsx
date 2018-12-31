// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class Gallery extends Component {

	static slug = 'cacm_gallery';

	render() {
	    return (
			<Fragment>
				<div className={"gallery " + (this.props.row_count) + " animtate-" + (this.props.animation)}>
					{this.props.content}
				</div>
			</Fragment>
	    );
	}

}

export default Gallery;
