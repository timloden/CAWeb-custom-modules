// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class AccordionList extends Component {

	static slug = 'cacm_accordion_list';

	render() {
	    return (
			<Fragment>
				<ul id="accordion" className="accordion-list list-overstated" role="tablist" aria-multiselectable={this.props.allow_multiselect}>
					{this.props.content}
				</ul>
			</Fragment>
	    );
	}

}

export default AccordionList;
