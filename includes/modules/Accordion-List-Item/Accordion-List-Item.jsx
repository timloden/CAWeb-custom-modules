// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';

class AccordionListItem extends Component {
	static slug = 'cacm_accordion_list_item';

	render() {
	    return (
	    	<Fragment>
                <li id={this.props.item_id} class="tab" aria-selected="false" aria-controls={this.props.panel_id} aria-expanded="false" role="tab" tabindex="0">
                    <a href="# ">{this.props.title}</a>
                </li>
                <div id={this.props.panel_id} class="panel" aria-labelledby={this.props.item_id} aria-hidden="false" role="tabpanel" style={{display: 'none'}}>
                    {this.props.content()}
                </div>
			</Fragment>
	    );
	}
}

export default AccordionListItem;
