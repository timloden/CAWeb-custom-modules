// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Panel extends Component {

	static slug = 'et_pb_ca_panel';

	renderIcon() {
		if (this.props.show_icon === 'on') {
			return (
				<span className="ca-gov-icon-info"></span>
			);
		}
	}

	renderButton() {
		if (this.props.show_button === 'on') {
			return (
				  <div className="options"><a href={this.props.button_link} class="btn btn-default">{this.props.button_text}</a></div>
			);
		}
	}

	renderTriangle() {
		if (this.props.panel_layout === 'standout highlight') {
			return (
				<span className="triangle"></span>
			);
		}
	}

	renderImage() {
		if (this.props.show_image === 'on') {
			return (
				  <div class="photo" style={{backgroundImage: "url(" + this.props.featured_image + ")"}}></div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
	        	<div className={"panel panel-" + (this.props.panel_layout) + " photo-" + (this.props.show_image === 'on' ? this.props.image_layout : '')}>
	        		<div className="panel-heading">
	        			{ this.renderTriangle() }
	        			<h3>{ this.renderIcon() } {this.props.title}</h3>
	        			{ this.renderButton() }
				    </div>
				    <div className="panel-body">				    	
				        { this.props.content() }
				        { this.renderImage() }
				    </div>
				</div>
	      	</Fragment>
	    );
	}

}

export default Panel;
