// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class Accordion extends Component {

	static slug = 'cacm_accordion';

	render() {
	    return (
			<Fragment>
				<div className="panel-group" id="accordion" role="tablist" aria-multiselectable={this.props.allow_multiselect}>
					{this.props.content}
				</div>
			</Fragment>
	    );
	}

}

export default Accordion;
