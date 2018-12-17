// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Panel extends Component {

	static slug = 'cacm_panel';

	renderIcon() {
		if (this.props.show_icon) {
			return (
				<span class="ca-gov-icon-info"></span>
			);
		} else {
			return (
				''
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
		if (this.props.show_button) {
			return (
				  <div class="options"><a href={this.props.button_link} class="btn btn-default">{this.props.button_text}</a></div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
	        	<div class={`panel panel-${this.props.panel_layout}`}>
	        		<div class="panel-heading">
	        			<h3>{ this.renderIcon() } {this.props.header_text}</h3>
	        			{ this.renderButton() }
				    </div>
				    <div class="panel-body">				    	
				        <p>{this.props.content()}</p>
				    </div>
				</div>
	      	</Fragment>
	    );
	}

}

export default Panel;
