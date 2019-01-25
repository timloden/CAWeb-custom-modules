// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Card extends Component {

	static slug = 'et_pb_ca_card';

	renderImage() {
		if (this.props.show_image === 'on') {
			return (
				<img className="card-img-top img-responsive" src={this.props.featured_image} alt="" />
			);
		}
	}

	renderHeader() {
		if (this.props.include_header === 'on') {
			return (
				  <div className="card-header">{this.props.title}</div>
			);
		}
	}

	renderButton() {
		if (this.props.show_button === 'on') {
			return (
				  <a href={this.props.button_link} className="btn btn-default">{this.props.button_text}</a>
			);
		}
	}

	renderFooter() {
		if (this.props.include_footer) {
			return (
				  <div className="card-footer">{this.props.footer_text}</div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
	        	<div className={`card card-${this.props.card_layout}`}>
	        		{ this.renderImage() }
				    { this.renderHeader() }
				    <div className="card-block">				    	
				        <h4 className="card-title">{this.props.card_title}</h4>
				        {this.props.content()}
				        { this.renderButton() }
				    </div>
				     { this.renderFooter() }
				</div>
	      	</Fragment>
	    );
	}

}

export default Card;
