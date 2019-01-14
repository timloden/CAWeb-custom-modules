// External Dependencies
import React, { Component, Fragment } from 'react';
import OwlCarousel from 'react-owl-carousel';

// Internal Dependencies
import './style.css';

class MediaSlider extends Component {

	static slug = 'cacm_media_slider';

	renderButton() {
		if (this.props.panel_show_button === 'on') {
			return (
				  <div className="options"><a href={this.props.panel_button_link} className="btn btn-default">{this.props.panel_button_text}</a></div>
			);
		}
	}

	renderTriangle() {
		if (this.props.panel_style === 'standout highlight') {
			return (
				<span className="triangle"></span>
			);
		}
	}

	renderSlider() {
		if (this.props.show_panel === 'on') {
			return (
				<div className={"panel panel-" + (this.props.panel_style)}>
					<div className={"panel-heading"}>
						{this.renderTriangle()}
						<h3>{this.props.panel_title}</h3>
						{this.renderButton()}
					</div>
					<div className={"panel-body"}>
						<OwlCarousel 
							className="carousel owl-carousel carousel-media"
							nav={true}
							dots={false}
							margin={10}
							items={4}
							loop
							navText={["<span class='ca-gov-icon-arrow-prev'></span>","<span class='ca-gov-icon-arrow-next'></span>"]}
						>
						    {this.props.content}
						</OwlCarousel>
					</div>
				</div>
			);
		} else {
			return (
				<OwlCarousel 
					className="carousel carousel-media"
					nav={true}
					dots={false}
					margin={10}
					items={4}
					loop
					navText={["<span class='ca-gov-icon-arrow-prev'></span>","<span class='ca-gov-icon-arrow-next'></span>"]}
				>
				    {this.props.content}
				</OwlCarousel>
			);
		}
	}
	
	render() {
	    return (
			<Fragment>
				{this.renderSlider()}
			</Fragment>
	    );
	}

}

export default MediaSlider;
