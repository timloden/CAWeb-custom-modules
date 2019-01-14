// External Dependencies
import React, { Component, Fragment } from 'react';
// import OwlCarousel from 'react-owl-carousel';

// Internal Dependencies
import './style.css';

class ContentSlide extends Component {
	static slug = 'cacm_content_slider_slide';

	renderTitle() {
		if (this.props.title) {
			return (
				 <h2>{this.props.title}</h2>
			);
		}
	}

	renderContent() {
		if (this.props.content) {
			return (
				 <div>{this.props.content()}</div>
			);
		}
	}

	renderButton() {
		if (this.props.show_button === 'on') {
			return (
				  <a href={this.props.button_link}><button className={"btn btn-primary"}>{this.props.button_text}</button></a>
			);
		}
	}

	renderImageFit() {
		if (this.props.slider_style === 'image_fit') {
			return (
				<img src={this.props.background} alt={this.props.title} />
			);
		}
	}

	renderSlide() {
		if (this.props.slider_style === 'content_fit') {
			return (
				<div className={"item " + (this.props.use_backdrop === 'on' ? 'backdrop' : '')} style={{backgroundImage: "url(" + this.props.background + ")"}}>
					<div className={"content-container"}>
                    	<div className={"content"}>
                    	{this.renderTitle()}
                    	{this.renderContent()}
						{this.renderButton()}
						</div>
					</div>
				</div>
			);
		} else {
			return (
				<div className={"item " + (this.props.use_backdrop === 'on' ? 'backdrop' : '')}>
					{this.renderImageFit()}
					<div className={"content-container"}>
                    	<div className={"content"}>
                    	{this.renderTitle()}
                    	{this.renderContent()}
						{this.renderButton()}
						</div>
					</div>
				</div>
			);
		}
	}

	render() {
	    return (
	    	<Fragment>
				{this.renderSlide()}
			</Fragment>
	    );
	}
}

export default ContentSlide;
