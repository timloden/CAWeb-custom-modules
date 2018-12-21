// External Dependencies
import React, { Component } from 'react';
import OwlCarousel from 'react-owl-carousel';

// Internal Dependencies
import './style.css';

class ContentSlider extends Component {

	static slug = 'cacm_content_slider';
	
	render() {
	    return (
			<OwlCarousel 
				className="carousel carousel-content"
				nav={true}
				items={1}
				slideBy={1}
				dots
				loop
				navText={["<span class='ca-gov-icon-arrow-prev'></span>","<span class='ca-gov-icon-arrow-next'></span>"]}
			>
			    {this.props.content}
			</OwlCarousel>
	    );
	}

}

export default ContentSlider;
