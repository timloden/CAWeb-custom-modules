// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Panel extends Component {

	static slug = 'cacm_panel';

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

	render() {
	    return (
			<Fragment>
	        	<div className={`panel panel-${this.props.panel_layout}`}>
	        		<div className="panel-heading">
	        			{ this.renderTriangle() }
	        			<h3>{ this.renderIcon() } {this.props.header_text}</h3>
	        			{ this.renderButton() }
				    </div>
				    <div className="panel-body">				    	
				        {this.props.content()}
				    </div>
				</div>
	      	</Fragment>
	    );
	}

}

export default Panel;
