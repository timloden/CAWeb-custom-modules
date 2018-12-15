// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Card extends Component {

	static slug = 'cacm_card';

	renderImage() {
		if (this.props.show_image) {
			return (
				<img src={this.props.featured_image} alt="" />
			);
		}
	}

	renderHeader() {
		if (this.props.include_header) {
			return (
				  <div class="card-header">{this.props.header_text}</div>
			);
		}
	}

	renderButton() {
		if (this.props.button) {
			return (
				  <a href={this.props.button_link} class="btn btn-default">{this.props.button_text}</a>
			);
		}
	}

	renderFooter() {
		if (this.props.include_footer) {
			return (
				  <div class="card-footer">{this.props.footer_text}</div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
	        	<div class="card card-default">
	        		{ this.renderImage() }
				    { this.renderHeader() }
				    <div class="card-block">				    	
				        <h4 class="card-title">{this.props.card_title}</h4>
				        <p>{this.props.content()}</p>
				        { this.renderButton() }
				    </div>
				     { this.renderFooter() }
				</div>
	      	</Fragment>
	    );
	}

}

export default Card;
